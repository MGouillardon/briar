<?php

namespace App\Http\Requests\Realtor;

use Illuminate\Foundation\Http\FormRequest;

class PropertyImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];
    }

    public function messages()
    {
        return [
            
            'images.required' => 'Please upload at least one image',
            'images.*.required' => 'Please upload at least one image',
            'images.*.mimes' => 'The path to the image must be a file of type: jpg, jpeg, png, webp.',
        ];
    }
}
