<?php

namespace App\Http\Requests;

class UpdateTradingConditionRequest extends FormRequest
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
            'trading_no' => 'required|max:255',
            'dealer_introduction_code' => 'max:255',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'trading_no' => '取引No ',
            'dealer_introduction_code' => 'ディーラー紹介コード'
        ];
    }

    /**
     * Get custom validation message error
     *
     * @return array
     */
    public function messages()
    {
        return [
            'trading_no.max' => ':attributeは255文字未満でなければなりません',
            'dealer_introduction_code.max' => ':attributeは255文字未満でなければなりません',
        ];
    }
}
