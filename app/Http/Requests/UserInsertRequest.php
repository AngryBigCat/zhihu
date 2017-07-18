<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInsertRequest extends FormRequest
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

    // 验证用户添加
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|same:password',
        ];
    }

    // 验证错误消息
    public function messages()
    {
        return [
            'name.required' => '请输入用户名',
            'name.regex' => '用户名格式不正确',
            'email.required' => '请输入邮箱',
            'email.email' => '邮箱格式不正确',
            'email.unique' => '邮箱已注册',
            'password.required' => '请输入密码',
            'password.regex' => '密码格式不正确',
            'password.same' => '两次密码输入不一致'
        ];
        
    }
}
