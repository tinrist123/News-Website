<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'txtUser' => 'required',
            'txtPass' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtUser.required' => 'Vui Lòng nhập Email',
            'txtPass.required' => 'Vui Lòng nhập mật khẩu'
        ];
    }
}
