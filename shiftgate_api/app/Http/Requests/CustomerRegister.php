<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CustomerRegister extends FormRequest
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
        $ruleMobilePhone = '';
        $ruleMobilePhoneTotal = '';
        if(isset(request()->mobile_phone_number_prefix) || isset(request()->mobile_phone_number_mid)
            || isset(request()->mobile_phone_number_subfix) || isset(request()->mobile_phone_number_total)){

            $ruleMobilePhone = 'numeric|digits_between:2,4';
            $ruleMobilePhoneTotal = 'numeric|digits_between:8,11';
        }

        $ruleFixedPhone = '';
        $ruleFixedPhoneTotal = '';
        if(isset(request()->fixed_phone_number_prefix) || isset(request()->fixed_phone_number_mid)
            || isset(request()->fixed_phone_number_subfix) || isset(request()->fixed_phone_number_total)){

            $ruleFixedPhone = 'numeric|digits_between:2,4';
            $ruleFixedPhoneTotal = 'numeric|digits_between:8,11';
        }

        $max_date = Carbon::now();
        $min_date = Carbon::now()->subYears(100);

        return [
            'key' => 'required',
            'last_name' => 'required|max: 255|string',
            'first_name' => 'required|max: 255|string',
            'last_name_kana' => 'required|max: 255|string',
            'first_name_kana' => 'required|max:255|string',
            'zipcode_prefix' => 'required|numeric|digits_between:2,4',
            'zipcode_subfix' => 'required|numeric|digits_between:2,4',
            'zipcode_total' => 'required|numeric|digits_between:7,7',
            'prefecture_id' => 'required|numeric',
            'address' => 'required|max: 255|string',
            'mobile_phone_number_prefix' =>  $ruleMobilePhone,
            'mobile_phone_number_mid' => $ruleMobilePhone,
            'mobile_phone_number_subfix' => $ruleMobilePhone,
            'mobile_phone_number_total' => $ruleMobilePhoneTotal,
            'fixed_phone_number_prefix' => $ruleFixedPhone,
            'fixed_phone_number_mid' => $ruleFixedPhone,
            'fixed_phone_number_subfix' => $ruleFixedPhone,
            'fixed_phone_number_total' => $ruleFixedPhoneTotal,
            'birthdate' => 'required|date|after:'.$min_date.'|before:'.$max_date
        ];
    }
}
