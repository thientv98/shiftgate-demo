<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
        return [
            'target' => 'required',
            'admin_id' => 'required',
            'content' => 'required'
        ];
    }

    public function attributes(){
        return  [
            'target' => '対象者',
            'admin_id' => '担当者',
            'content' => '内容',
        ];
    }

    public function messages()
    {
        return [
            'target.required' => ':attributeは必須項目です',
            'admin_id.required' => ':attributeは必須項目です',
            'content.required' => ':attributeは必須項目です',
        ];
    }
}
