<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'title' => 'required|string|max:20',
            'description' => 'required|string|min:8|max:255',
            'area' => 'required|integer|min:20|max:2000',
            'rooms' => 'required|integer|min:1|max:10',
            'bedrooms' => 'required|integer|min:1',
            'floor' => 'required|integer|min:0',
            'price' => 'required|integer|min:1000|max:1000000',
            'city' => 'required|string|min:3|max:50',
            'address' => 'required|string|min:3|max:255',
            'zip_code' => 'required|min:3|max:255',
            'sold' => 'required|boolean',
        ];
    }
}
