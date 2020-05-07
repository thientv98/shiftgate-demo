<?php

namespace App\Http\Controllers\ApiFront;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessage;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use  Musonza\Chat\Facades\ChatFacade as Chat;
use Musonza\Chat\Models\Participation;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth){
        $this->auth = $auth;
    }

    public function index()
    {
        $conversation = Chat::conversations()->conversation->all();
        return $this->response(true, $conversation, 'Chat list');
    }

    public function store(Request $request)
    {
        /*
         * "data": [],
        */
        $participants = $request->user();
        $conversation = Chat::createConversation([$participants], $request->input('data', []))->makePrivate(false);
        return $this->response(true, $conversation, 'Conversation created');
    }

    public function show($id)
    {
        $conversation = Chat::conversations()->getById($id);
        return $this->response(true, $conversation, 'Conversation detail');
    }

    public function update(Request $request, $id)
    {
        $conversation = Chat::conversations()->getById($id);
        $conversation->update(['data' => $request->all()]);

        return $this->response(true, $conversation, 'Conversation updated');
    }

    /* Conversation Participation */
    public function getParticipation($conversationId)
    {
        $conversation = Chat::conversations()->getById($conversationId);
        return $this->response(true, $conversation, 'Participation list');
    }

    public function showParticipation($conversationId, $participationId)
    {
        $participation = Participation::find($participationId);
        return $this->response(true, $participation, 'Participation detail');
    }

    public function storeParticipation(Request $request, $conversationId)
    {
        $user = $request->user();
        $conversation = Chat::conversations()->getById($conversationId);
        Chat::conversation($conversation)->addParticipants([$user]);

        return $this->response(true, $conversation, 'Participation saved');
    }

    public function destroyParticipation($conversationId, $participationId)
    {
        $conversation = Chat::conversations()->getById($conversationId);
        $participation = Participation::find($participationId);
        $conversation = Chat::conversation($conversation)->removeParticipants([$participation->messageable]);

        return response($conversation->participants);
    }

    /* Messaging */
    public function getMessage(Request $request,$conversationId)
    {
        $user = $request->user();
        $conversation = Chat::conversations()->getById($conversationId);
        $message = Chat::conversation($conversation)
            ->setParticipant($user)
            ->getMessages();
        return $this->response(true, $message, 'Messages list');
    }

    public function showMessage(Request $request, $conversationId, $messageId)
    {
        $message = Chat::messages()->getById($messageId);
        return $this->response(true, $message, 'Messages detail by id');
    }

    public function storeMessage(StoreMessage $request, $conversationId)
    {
        /*{
                "type" : "customer"
                "message": {
                    "body": "content"
                }
        }*/
        try {
            $request->validated();
            $user = $request->type ? Customer::find($request->user()->id) : User::find($request->user()->id);
            $conversation = Chat::conversations()->getById($conversationId);
            $data = $request->all()['message']['body'];
            $message = Chat::message($data)
                ->from($user)
                ->to($conversation)
                ->send();
            return $this->response(true, $message, 'Message sent');
        } catch (\Exception $e) {
            return $this->response(true, null, $e->getMessage(), 500);
        }
    }

    public function destroyMessage(Request $request, $conversationId, $messageId)
    {
        try {
            DB::beginTransaction();
            $message = Chat::messages()->getById($messageId);
            $user = $request->user();
            Chat::message($message)
                ->setParticipant($user)
                ->delete();
            DB::commit();
            return $this->response(true, null, 'Message deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->response(true, null, $e->getMessage(), 500);
        }
    }

    public function deleteAllMessage(Request $request, $conversationId)
    {
        try {
            DB::beginTransaction();
            $user = $request->user();
            $conversation = Chat::conversations()->getById($conversationId);
            Chat::conversation($conversation)
                ->setParticipant($user)
                ->clear();
            DB::commit();
            return $this->response(true, null, 'All message deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->response(true, null, $e->getMessage(), 500);
        }
    }

    public function getConversation(Request $request)
    {
        $user = $request->user();
        $conversations = Chat::conversations()->setParticipant($user)->get();
        if(count($conversations) == 0){
            $participants = $request->user();
            $admin = User::all();

            /* Create a new conversation */
            $conversation = Chat::createConversation([$participants], $request->input('data', []))->makePrivate(false);

            /* Add all the admin to this conversation */
            foreach ($admin as $item){
                $conversation->addParticipants([$item]);
            }
            $conversation->data['id'] = $conversation->id;
            return $this->response(true, $conversation, 'New Conversation');
        } else {
            $conversation = Chat::conversations()->getById($conversations[0]->id);
            $message = Chat::conversation($conversation)
                ->setParticipant($user)
                ->setPaginationParams([
                    'perPage' => 1000,
                ])
                ->getMessages();
            if(!count($message)){
                $message['id'] = $conversations[0]->id;
            }
            return $this->response(true, $message, 'Get Conversation');
        }
    }

}
