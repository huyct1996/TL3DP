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
            'txtUsername' => 'required|email',
            'txtPassword' => 'required'
        ];
    }
    public function messages() {
        return [
            'txtUsername.required' =>'Vui Lòng Nhập Email Đăng Nhập',
            'txtPassword.required' =>'Vui Lòng Nhập Mật Khẩu',
            'txtUsername.email'     => 'Không đúng định dạng Email'
        ];
    }
}
