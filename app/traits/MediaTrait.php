<?php

namespace App\traits;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait MediaTrait
{

    function uploadImage($image, $path, $size, $name)
    {
        $name = str_replace(' ', '', $name);
        $filename = $name . '_' . time() . '_' . '.' . $image->getClientOriginalExtension();
        $path = public_path($path . $filename);
        Image::make($image->getRealPath())->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 100);

        return $filename;
    }
    function deleteImage($image)
    {
        if (File::exists($image)) {
            unlink($image);
        }
    }

    function uploadToS3($title, $file)
    {
        try {


            $filename = str_replace(' ', '', $title) . '_' . time() . '_' . '.' . $file->getClientOriginalExtension();

            $disk = Storage::disk('s3');
            $disk->put($filename, fopen($file, 'r+'));
            return $filename;
        } catch (Exception $e) {
            return back()->with(['error' => $e->getMessage()]);
        }
    }
}
