<?php

namespace App\Http\Controllers\ApiFront;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class MeController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth){
        $this->auth = $auth;
    }

    public function index(Request $request){
        $user = $request->user();
        
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function logout(){
        $this->auth->invalidate();
        return response()->json([
            'success' => true
        ]);
    }

    public function save(StoreCustomer $request)
    {
        try {
            $params = $request->all();
            $user = Customer::find($request->id);
            $user->fill($params);
            $user->save();
            $sendMail = env('MAIL_ADDRESS_CON');
            Mail::send(['text' => 'email.my-page-edit'], ['customer' => $user], function($message) use ($sendMail) {
                $message->to($sendMail, "")->subject(trans('common.mail.my_page_edit_subject'));
            });
            $data = [
                'user' => $user,
                'params' => $params
            ];
            return $this->response(true, $data, trans('common.request.success'));
        } catch (\Exception $e) {
            return $this->response(false, null, $e->getMessage(), 500);
        }
    }

    public function show(Request $request, $id){
        $user = Customer::find($request->id);
        
        return response()->json([
            'success' => true,
            'data' => ['user' => $user, 'prefecture' => $user->prefecture]
        ]);
    }

    public function withDrawal(Request $request){
        try{
            $user = $request->user();
            $user->withdrawal_date = Carbon::now();
            $user->save();

            $sendMail = env('MAIL_ADDRESS_CON');
            $dataRequest = $request->all();
            Mail::send(['text' => 'email.withdrawal'], ['customer' => $user, 'request' => $dataRequest], function($message) use ($sendMail) {
                $message->to($sendMail, "")->subject('SHIFTGATE退会の通知');
            });

            return $this->response(true, null, "success", 200);

        } catch (\Throwable $th) {
            return $this->response(false, null, $th->getMessage(), 400);
        }
    }
}
