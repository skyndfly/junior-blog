<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guard('admin')->check();
    }

    public function rules(): array
    {
        $catId = $this->input('id');

        return [
            'id' => 'required|exists:categories,id',
            'name' => 'required|unique:categories,name,'.$catId,
            'slug' => 'required|unique:categories,slug,'.$catId,
            'parentId' => 'nullable|exists:categories,id',
        ];
    }
}
