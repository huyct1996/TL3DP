<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDungRequest extends FormRequest
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
            'txtName' => 'required',
            'txtEmail' => 'required|email|unique:users,email',
            'txtPassword'=>'required|min:8',
            'txtPasswordV' =>'required|same:txtPassword'
        ];
    }
    public function messages() {
        return [
            'txtName.required' =>'Vui Lòng Nhập Tên Người Dùng',
            'txtEmail.required' =>'Vui Lòng Nhập Tên Email',
            'txtEmail.unique' =>'Email Đã Tồn Tại',
            'txtEmail.email' =>'Email chưa đúng định dạng ',
            'txtPassword.required' =>'Vui Lòng Nhập Mật Khẩu',
            'txtPasswordV.required' =>'Vui Lòng Nhập Mật Khẩu Xác Nhận',
            'txtPasswordV.same' =>'Mật Khẩu Xác Nhận Chưa Đúng',
            'txtPassword.min' => 'Mật khẩu tối thiểu 8 ký tự'
        ];
    }
}
