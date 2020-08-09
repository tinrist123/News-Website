<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'txtName' => 'required',
            'txtPass' => 'same:txtRePass',
            'txtEmail' => 'required|email|unique:users,email'
        ];
    }

    public function mesage()
    {
        return [
            //
            'txtName.required' => 'Vui lòng điền họ tên',
            'txtEmail.required' => 'Vui lòng điền Nhập Email!!',
            'txtEmail.email' => 'Đây không phải là Email! Xin hãy nhập lại',
            'txtEmail.unique' => 'Email đã tồn tại !',
            'txtPass.same' => 'hai mật khẩu chưa khớp với nhau'
        ];
    }
}
