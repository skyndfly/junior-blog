<?php

namespace App\Helpers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class UploadImageHelper
{
    private const STORE_PATH = 'storage/uploads/';

    public static function uploadImage(FormRequest $request, $path, string $key): null|string
    {
        if ($request->hasFile('mainImage')) {
            $imagePath = $request->file($key)->store(self::STORE_PATH . $path, 'public');
        } else {
            $imagePath = null;
        }
        return $imagePath;
    }
    public static function updateImage(FormRequest $request, $path, string $key, string $oldImage): null|string
    {
        if ($request->hasFile('mainImage')) {
            Storage::delete($oldImage);
            return $request->file($key)->store(self::STORE_PATH . $path, 'public');
        }
        return $oldImage;
    }

}
