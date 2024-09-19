<?php

namespace App\Http\Requests\Comments;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class CommentsAuthStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|string',
            'id' => 'required|exists:articles,id',
            'userId' => 'required',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $uuid = Uuid::uuid4();
        $message = "Validation failed: " . implode(", ", $validator->errors()->all()) . ". Error code - {$uuid}";

        Log::error($message);

        throw new HttpResponseException(response()->json([
            'message' => "Ошибка валидации. Обратитесь к администрации сайта, указав код - {$uuid}",
            'errors' => $validator->errors(),
        ], 422, [], JSON_UNESCAPED_UNICODE));
    }
}
