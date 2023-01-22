<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_title' => "required|min:5|max:128|unique:products,product_title,{$this->product->id}",
            'product_code' => 'required',
            'product_quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'product_details' => 'required',
            'video_link' => 'url',
            'image_one' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image_two' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image_three' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
