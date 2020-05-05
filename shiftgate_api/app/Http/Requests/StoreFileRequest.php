<?php

namespace App\Http\Requests;

class StoreFileRequest extends FormRequest
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
        if(request()->file_id != 'null')
            return [
                'file' => 'required|file|mimes:pdf'
            ];
        return [
            'file' => 'required|file|mimes:doc,docx,xlsx,pdf,pptx,csv,jpg,png,jpeg,txt'
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
            'file' => 'ファイル',
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
            'file.required' => ':attributeは必須項目です',
        ];
    }
}
