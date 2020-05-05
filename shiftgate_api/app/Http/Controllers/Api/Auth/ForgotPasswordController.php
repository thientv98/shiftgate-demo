<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User;
use App\Models\PasswordReissue;
use Illuminate\Http\Request;
use App\Notifications\ForgotPassword;
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
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return $this->response(false, null, '該当のメールアドレスがありません', 404);
        $passwordReset = PasswordReissue::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'key' => md5(uniqid(rand(), true))
            ]
        );

        // send mail forgot password
        // $user->notify(new ForgotPassword($passwordReset->key));

        $url = config('app.admin_url').('/auth/password-reset/'.$passwordReset->key);
        $toEmail = $user->email;
        Mail::send(['text' => 'auth.forgot-password'], ['url' => $url], function($message) use ($request, $toEmail) {
            $message->to($toEmail, "")->subject("SHIFTGATE 管理者パスワード再設定");
        });

        return $this->response(true, $passwordReset, '送信しました');
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
            'password' => 'required',
            'key' => 'required'
        ]);

        $passwordReset = PasswordReissue::where('key', $request->key)->first();

        if (!$passwordReset)
            return $this->response(false, null, 'This password reset token is invalid.', 404);

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user)
            return $this->response(false, null, 'We can not find a user with that e-mail address.', 404);

        $user->password = bcrypt($request->password);
        $user->save();
        // $passwordReset->delete();
        return $this->response(true, $user, 'Change password successfully');
    }

    public function checkKey(Request $request) 
    {
        $passwordReset = PasswordReissue::where('key', $request->key)->first();
        if (!$passwordReset)
            return $this->response(false, null, 'This password reset token is invalid.', 404);
        return $this->response(true, null, 'This password reset token was exist');
    }
}
