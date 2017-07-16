<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagInsertRequest extends FormRequest
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
            'tag_name'=> 'required|unique:tags,tag_name',
            'description' =>'required',
            'img' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tag_name.required' =>'话题必填',
            'tag_name.unique' => '话题已存在',
            'description.required'='请填写话题描述',
            'img.required'='未上传图片'
        ];
    }
}
