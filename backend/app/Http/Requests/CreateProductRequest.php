<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'message' => $validator->errors()], 412));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'store_id',
            'category_id' => 'required',
            'name' => 'required',
            'barcode' => 'required',
            'description' => 'required',
            'image' => 'required',
            'is_active' => 'required',
            'product_customize' => 'required|array',
            'product_customize.*.size' => 'required',
            'product_customize.*.price' => 'required',
            'product_customize.*.quantity' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'product_customize.*.size.required' => 'The size field is required.',
            'product_customize.*.price.required' => 'The price field is required.',
            'product_customize.*.quantity.required' => 'The quantity field is required.',
        ];
    }

}
