<?php

namespace App\Http\Controllers\ApiFront\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\Customer;
use App\Models\PasswordReissue;
use Illuminate\Http\Request;
use App\Notifications\CustomerForgotPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [json] message
     */
    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255'
        ]);

        // $customer = Customer::where('email', $request->email)->first();
        // if (!$customer)
        //     return $this->response(false, null, '該当のメールアドレスがありません', 404);
        
        $passwordReset = PasswordReissue::updateOrCreate(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'key' => md5(uniqid(rand(), true))
            ]
        );

        // send mail forgot password
        // $customer->notify(new CustomerForgotPassword($passwordReset->key));

        $url = config('app.front_url') . "/password/reset/". $passwordReset->key;
        $toEmail = $request->email;
        Mail::send(['text' => 'email.customer-forgot-password'], ['url' => $url], function($message) use ($request, $toEmail) {
            $message->to($toEmail, "")->subject("パスワード再設定");
        });

        return $this->response(true, $passwordReset, '送信しました');
    }

     /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [view] password reset
     */
    public function find($token)
    {
        $passwordReset = PasswordReissue::where('key', $token)->first();

        if (!$passwordReset)
            abort(404);
        
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            abort(404);
        }
        return redirect()->to(config('app.admin_url').'/auth/password-reset/'.$token)->with(['user' => $passwordReset]);
    }

    /**
     * Reset password
     *
     * @param  [string] key
     * @param  [string] password
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|min:4|max:50|string',
            're_password' => 'required|same:password',
            'key' => 'required'
        ]);

        $passwordReset = PasswordReissue::where('key', $request->key)->first();

        if (!$passwordReset)
            return $this->response(false, null, 'This password reset token is invalid.', 404);

        $customer = Customer::where('email', $passwordReset->email)->first();

        if (!$customer)
            return $this->response(false, null, 'We can not find a user with that e-mail address.', 404);

        $customer->password = bcrypt($request->password);
        $customer->save();
        // $passwordReset->delete();
        return $this->response(true, $customer, 'Change password successfully');
    }
}
