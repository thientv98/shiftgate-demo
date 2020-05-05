<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Response;
use App\Models\User;

class AuthController extends Controller
{
    public function login(StoreAuth $request)
    {
        $credentials = $request->only('email', 'password');
        if (!($token = JWTAuth::attempt($credentials))) {
            return $this->response(false, null, __('auth.login.false'));
        }

        $user = Auth::user();
        $data = [
            'login' => true,
            'token' => $token,
            'info' => [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'user_role_code' => $user->user_role_code,
                'user_group_id' => $user->user_group_id,
                'is_unable' => $user->is_unable,
            ]
        ];
        return $this->response(true, $data, __('auth.login.true'));

    }

    public function auth(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $data = [
                'login' => true,
                'info' => [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'id' => $user->id,
                ]
            ];
            return $this->response(true, $data, __('auth.login.true'));
        } catch (TokenExpiredException $e) {
            return $this->response(false, null, __('auth.token.expired'));
        } catch (JWTException $e) {
            return $this->response(false, null, __('auth.token.valid'));
        }
    }
}
