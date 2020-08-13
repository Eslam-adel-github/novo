<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Classes\UploadHelper;
use App\Http\Controllers\Controller;
use App\Imageable;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * MultiUpload Images
     * @param array $images
     * @param string $dir
     * @param UploadedFile $image
     * @param string $checkFunction
     * @return string
     */
    public static function store(Request $request)
    {
            $request->validate([
                'images' => 'required|array',
                'images.*' => 'required',
            ]);

        $images = $request->images;

        $dir = $request->dir;

        $checkFunction = $request->checkFunction;
        $uploaded_images = [];
        foreach ($images as $image) {
            $uploaded_images[] = UploadHelper::Upload($dir, $image, $checkFunction);
        }

        return response()->json(['link' => $uploaded_images], 200);
    }


}
