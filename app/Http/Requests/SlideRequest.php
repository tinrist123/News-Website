<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'txtTen' => 'required',
            'txtContent' => 'required',
            'txtLink' => 'required',
            'fImages' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'txtTen.required' => 'Vui lòng chọn loại thể loại! ',
            'txtLink.required' => 'Vui lòng nhập tóm tắt !',
            'txtContent.required' => 'Vui lòng nhập nội dung!',
            'fImages.image' => 'File của bạn phải là hình ảnh!',
            'fImages.mimes' => 'File của bạn phải là dạng jpeg,png,jpg,gif,svg!',
            'fImages.max' => 'File của bạn phải có kích thước < 2048KB',
            'fImages.required' => 'Vui lòng chọn hình ảnh! ',
        ];
    }
}
