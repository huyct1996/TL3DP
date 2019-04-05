<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
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
            'txtTypeName' => 'required|unique:type_news,name'
        ];
    }
    public function messages() {
        return [
            'txtTypeName.required' =>'Vui Lòng Nhập Tên Loại Tin',
            'txtTypeName.unique' =>'Tên Loại Tin Đã Tồn Tại'
        ];
    }
}
