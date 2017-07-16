<?php

namespace App\Http\Requests\\admin;

use Illuminate\Foundation\Http\FormRequest;

class ListFoundEditRequest extends FormRequest
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
            'title' => 'required|regex:/*+\?$/|unique:title,title',
            'created_at' => 'required',
            'topic' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'sorry！您还未写下您的问题',
            'title.regex' => 'sorry！您必须以？结尾',
            'title.unique' => 'sorry！您的问题已存在',
            'create_at.required' => 'sorry！您需要给定一个提问时间'，
            'topic.required' => 'sorry！您需要给您的问题选一个类别'
        ];
    }
}
