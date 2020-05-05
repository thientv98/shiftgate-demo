<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Notice;

class StoreNotice extends FormRequest
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
        Validator::extend('valid_url', function($attribute, $value, $parameters)  {
            if (empty($value)) return true;
            $pattern = '/(?:https?:\/\/)?(?:[a-zA-Z0-9.-]+?\.(?:[a-zA-Z])|\d+\.\d+\.\d+\.\d+)/';
            if(preg_match($pattern, $value)) {
                return $value;
            } else {
                return false;
            }
        });

        return [
            'content' => 'bail|required',
            'link_url' => 'bail|max:255|valid_url',
            'published_date' => 'bail|required',
        ];
    }

    public function attributes()
    {
        $attributes =  [
            'content' => '内容', 
            'link_url' => 'リンクURL', 
            'published_date' => 'お知らせ日付', 
        ]; 
        return $attributes;
    } 

    public function messages()
    {
        return [
            'link_url.valid_url' => ':attributeは、有効なURL形式で指定してください。',
        ];
    }
}
