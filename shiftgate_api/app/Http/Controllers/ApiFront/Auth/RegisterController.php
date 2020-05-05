<?php

namespace App\Http\Controllers\ApiFront\Auth;

use App\Models\TmpRegistrations;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CustomerRegister;
use App\Models\Customer;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if(!$validator->fails()){
            try{
                $user = $this->create($request->all()); 
                $url = config('app.front_url').'/register/confirm/'.$user->key;
                Mail::send(['text' => 'email.register'], ['user' => $user, 'url' => $url], function($message) use ($user, $url) {
                    $message->to($user->email, "")->subject(trans('common.mail.register_subject'));
                });
                $token = $this->auth->attempt($request->only('email', 'password'));
                return $this->response(true, $token, "success", 200);
            } catch (\Throwable $th) {
                return $this->response(false, null, $th->getMessage(), 500);
            }
        }

        return $this->response(false, $validator->errors(), "errors", 400);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $unique = '';
        $email = Customer::where(['email' => $data['email'], 'is_deleted' => 0])->get();
        if(count($email) > 0) {
            $unique = 'unique:'.Customer::getTableName();
        }
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', $unique],
            'password' => ['required', 'string', 'min:4', 'max:50'],
        ],[
            'email.unique' => 'そのメールアドレスは使用できません。'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\TmpRegistrations
     */
    protected function create(array $data)
    {
        return TmpRegistrations::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'key' => Str::random(60)
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \App\Http\Requests\CustomerRegister $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(CustomerRegister $request){
        $tmpRegistration = TmpRegistrations::where('key', $request->key)->first();
        if(!isset($tmpRegistration)){
            return $this->response(false, null, trans('common.request.failed'), 404);
        }

        try{
            $email = Customer::where(['email' => $tmpRegistration->email, 'is_deleted' => 0])->get();
            if(count($email) > 0) {
                return $this->response(false, null, trans('auth.register.duplicate_email'), 400);
            } 

            $customer = $this->createCustomer($request, $tmpRegistration);

            Mail::send(['text' => 'email.register-success'], ['customer' => $customer], function($message) use ($customer) {
                $message->to($customer->email, "")->subject(trans('common.mail.register_success_subject'));
            });

            return $this->response(true, $customer, trans('common.request.success'), 200);
        } catch (\Throwable $th) {
            return $this->response(false, null, $th->getMessage(), 500);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $request, $tmpRegistration
     * @return \App\Models\Customer
     */
    protected function createCustomer($request, $tmpRegistration)
    {
        $data = $request->all();
        $data['zipcode'] = $request->zipcode_prefix . $request->zipcode_subfix;
        $data['mobile_phone_number'] = $request->mobile_phone_number_prefix . $request->mobile_phone_number_mid .$request->mobile_phone_number_subfix;
        $data['fixed_phone_number'] = $request->fixed_phone_number_prefix . $request->fixed_phone_number_mid .$request->fixed_phone_number_subfix;
        $data['email'] = $tmpRegistration->email;
        $data['password'] = $tmpRegistration->password;
        $data['type'] = Customer::TYPE_C;
        $data['is_deleted'] = 0;
        $data['birthdate'] = \Carbon\Carbon::parse($request->birthdate)->format('Y/m/d');
        return $customer = Customer::create($data);
    }
}
