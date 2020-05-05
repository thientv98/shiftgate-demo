<?php

namespace App\Http\Controllers\ApiFront\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $device = $request->get('device');

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            $res = [
                'code' => 422,
                'message' => trans('auth.login.locked'),
                'data' => null,
            ];

            if($device == 'web'){
                $res['errors'] = [
                    "msg" => trans('auth.login.locked')
                ];
            }
            return response()->json($res,422);
        }
        try {
            if (!$token = $this->auth->attempt($request->only('email', 'password'))) {
                $res = [
                    'code' => 422,
                    'message' => trans('auth.login.false'),
                    'data' => null,
                ];

                if($device == 'web'){
                    $res['errors'] = [
                        "msg" => trans('auth.login.false')
                    ];
                }

                return response()->json($res,422);
            }

        } catch (\Throwable $th) {
            $res = [
                'code' => 422,
                'message' => $th->getMessage(),
                'data' => null,
            ];

            if($device == 'web'){
                $res['errors'] = [
                    "msg" => $th->getMessage()
                ];
            }

            return response()->json($res,422);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        // check user was delete
        if($this->auth->user()->is_deleted == 1) {
            $res = [
                'code' => 422,
                'message' => trans('auth.login.deleted'),
                'data' => null,
            ];

            if($device == 'web'){
                $res['errors'] = [
                    "msg" => trans('auth.login.deleted')
                ];
            }

            return response()->json($res,422);
        }

        // check user was withdrawal
        if($this->auth->user()->withdrawal_date) {
            $res = [
                'code' => 422,
                'message' => trans('auth.login.withdrawal'),
                'data' => null,
            ];

            if($device == 'web'){
                $res['errors'] = [
                    "msg" => trans('auth.login.withdrawal')
                ];
            }

            return response()->json($res,422);
        }

        $res = [
            'code' => 200,
            'message' => 'Token generate successfully',
            'data' => [
                'token' => $token,
                'customer' => $this->auth->user()->only(['id','type','last_name','first_name']),
            ]
        ];

        if($device == 'web'){
            $res['token'] = $token;
        }

        return response()->json($res, 200);
    }
}
