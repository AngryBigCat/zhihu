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
            'email' =>'required|email',
            'password' => 'required|regex:/^\S{6,20}$/'
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式不正确',
            'password.required' => '密码必填',
            'password.regex' => '密码格式不正确'
        ];

    }
}
