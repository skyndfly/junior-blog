<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:140',
            'slug' => 'required|string',
            'description' => 'required|string',
            'shortDescription' => 'required|max:250',
            'mainImage' => 'nullable|image|mimes:jpg,jpeg,png',
            'categoryId' => 'required|integer|exists:categories,id',
            'status' => 'required|string'
        ];
    }
}
