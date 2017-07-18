<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionPost extends FormRequest
{
    /*
     * 自定义验证错误格式
     */
    protected function formatErrors(Validator $validator)
    {
        $error = $validator->errors()->all();
        return $error;
    }

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
            'title' => 'required|unique:questions|max:50',
            'describe' => 'nullable'
        ];
    }
}
