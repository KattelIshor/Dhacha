<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            "title_en" => "required|min:8|max:128|unique:posts,title_en,{$this->post->id}",
            "title_bn" => "required|min:8|max:128|unique:posts,title_bn,{$this->post->id}",
            "description_en" => "required",
            "description_bn" => "required",
            "image" => "mimes:jpg,png,jpeg,gif,svg|max:2048",
        ];
    }
}
