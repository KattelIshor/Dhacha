<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'name' => 'required|min:3|max:30',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required|min:6',
            'post_code' => 'required|min:4|max:6',
            'paymentMethod' => 'required'
        ];
    }
}
