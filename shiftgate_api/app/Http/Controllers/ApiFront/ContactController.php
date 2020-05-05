<?php

namespace App\Http\Controllers\ApiFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        foreach(config('app.contact_type') as $key => $val){
            array_push($data, ['name' => $val, 'value' => $key]);
        }
        return $this->response(true, ['contact_type' => $data], "success"); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        try{
            $toEmail = ($request->type == 1) ? config('app.mail_customer_support') : config('app.mail_info');

            $dataRequest =  $request->all();
            $dataRequest['type'] = config('app.contact_type')[$request->type];

            //Send email to shiftgate
            Mail::send(['text' => 'email.contact-to-shiftgate'], $dataRequest, function($message) use ($request, $toEmail) {
                $message->to($toEmail, "")->subject("SHIFTGATEお問い合わせの通知");
            });

            //Send email to customer
            Mail::send(['text' => 'email.contact-to-customer'], $dataRequest, function($message) use ($request) {
                $message->to($request->email, "")->subject("お問い合わせ");
            });

            return $this->response(true, null, "success", 200);

        } catch (\Throwable $th) {
            return $this->response(false, null, $th->getMessage(), 400);
        }
    }
}
