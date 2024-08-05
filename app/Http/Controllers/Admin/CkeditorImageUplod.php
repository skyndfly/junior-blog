<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CkeditorImageUplod extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/' . $filename;

            Storage::disk('public')->put($filePath, file_get_contents($file));

            $url = Storage::url($filePath);

            return response()->json([
                'url' => $url
            ]);
        }
        return response()->json(['uploaded' => false], 400);
    }
}
