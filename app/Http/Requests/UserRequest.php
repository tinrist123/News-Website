<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'txtPass' => 'required',
            'txtRePass' => 'required|same:txtPass',
            'txtEmail' => 'required|email|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'txtUser.required' => 'Vui Lòng Nhập Tài Khoản',
            'txtPass.required' => 'Vui lòng nhập mật khẩu',
            'txtRePass.required' => 'Vui lòng nhập lại mật khẩu',
            'txtPass.same' => 'Vui lòng nhập mật khẩu trùng với mật khẩu ở trên',
            'txtEmail.required' => 'Vui lòng nhập email',
            'txtEmail.unique' => 'Email bạn đã trùng',
            'txtEmail.email' => 'Email không đúng cú pháp',
        ];
    }
}
