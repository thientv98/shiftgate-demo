<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = request()->all();
        $rule_email = 'required';
        $rule_password = 'required';
        $unique_email = '';
        $query = User::where(['email' => $request['email'], 'is_deleted' => 0]);

        if(isset($request['id'])) {
            $rule_password = '';
            $data = $query->where('id', '!=', $request['id'])->get();
            if(count($data) >= 1) {
                if($data[0]->email == $request['email'])
                    $unique_email = '|unique:'.User::getTableName().',email';
            } else {
                $unique_email = '';
            }
        } else {
            $data = $query->get();
            if(count($data) > 0) {
                $unique_email = '|unique:'.User::getTableName().',email';
            } 
        }        

        return [
            'last_name' => 'bail|required|max:255',
            'first_name' => 'bail|required|max:255',
            'last_name_kana' => 'bail|required|max:255',
            'first_name_kana' => 'bail|required|max:255',
            'email' => 'bail|'.$rule_email.'|email|max:255'.$unique_email,
            'password' => 'bail|'.$rule_password.'|min:4|max:50',
        ];
    }

    public function attributes(){
        $attributes =  [
            'last_name' => '氏名(姓)', 
            'first_name' => '氏名(名) ', 
            'last_name_kana' => 'フリガナ(姓) ', 
            'first_name_kana' => 'フリガナ(名)', 
            'email' => 'メールアドレス',
            'password' => 'ログインパスワード',
        ]; 
        return $attributes;
    } 

    public function messages()
    {
        return [
            'last_name.required' => ':attributeは必須項目です',
            'first_name.required' => ':attributeは必須項目です',
            'last_name_kana.required' => ':attributeは必須項目です',
            'first_name_kana.required' => ':attributeは必須項目です',
            'email.email' => '正しいメールアドレスの記述ではありません。',
            'email.required' => ':attributeは必須項目です',
            'password.required' => ':attributeは必須項目です',
        ];
    }
}
