<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('post')) {
            return [
                'name' => 'required|string|max:258',
                'price' => 'required|string',
                'availability' => 'required|string'
            ];
        } else {
            return [
                'name' => 'required|string|max:258',
                'price' => 'required|string',
                'availability' => 'required|string'
            ];
        }
    }
     
    public function messages()
    {
        if(request()->isMethod('post')) {
            return [
                'name.required' => 'Name is required!',
                'price.required' => 'price is required!',
                'availability.required' => 'this is required!'
            ];
        } else {
            return [
                'name.required' => 'Name is required!',
                'price.required' => 'price is required!',
                'availability.required' => 'this is required!'
            ];   
        }
    }
}