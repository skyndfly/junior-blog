<?php

namespace App\Http\Requests\Admin\Article;

use App\Models\Article;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'slug' => 'required|string|unique:articles,slug',
            'description' => 'required|string',
            'shortDescription' => 'required|max:250',
            'mainImage' => 'required|image|mimes:jpg,jpeg,png',
            'categoryId' => 'required|integer|exists:categories,id',
            'status' => 'required|string',
            'admin_id' => 'required|integer|exists:admins,id',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'admin_id' => auth()->guard('admin')->id(),
            'status' => $this->get('status') ?? Article::STATUS_UNPUBLISHED,
        ]);
    }
}
