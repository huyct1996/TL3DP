<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
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
            'sltloaitincha' => 'required|not_in:0',
            'txtTitle' => 'required',
            'fImages' => 'required|image'
        ];
    }
    public function messages() {
        return [
            'sltloaitincha.not_in' => 'Vui Lòng Chọn Loại Tin Tức',
            'txtTitle.required'  => 'Vui Lòng Nhập Tiêu Đề',
            'txtTitle.unique'    => 'Tiêu Đề Tin Tức Đã Tồn Tại',
            'fImages.required'    => 'Vui Lòng Chọn Hình Ảnh',
            'fImages.image' => 'Vui Lòng Chọn File Hình Ảnh'

        ];
    }
}
