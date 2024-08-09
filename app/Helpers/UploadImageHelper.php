<?php

namespace App\Helpers;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageHelper
{
    private const STORE_PATH = 'uploads/';

    public static function uploadImage(FormRequest $request, $path, string $key): null|string
    {
        if ($request->hasFile('mainImage')) {
            $imagePath = $request->file($key)->store(self::STORE_PATH . $path, 'public');
        } else {
            $imagePath = null;
        }
        return $imagePath;
    }

}
