<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageManagement
{

    public function uploadSingleImage($path, $image, $disk)
    {
        $imageName = $this->GenerateNewName($image);
        self::saveImageLocal($image, $path, $imageName, $disk);
        return $imageName;
    }

    public function UploadImages($images, $model, $disk)
    {
        $allImages = [];
        foreach ($images as $image) {
            self::deleteImageFromLocal($image);
            $path = self::GenerateNewName($image);
            self::saveImageLocal($image, '/', $path, $disk);
            $allImages[] = [
                'name' => $path
            ];
        }

        $model->images()->createMany($allImages);
    }

    private function saveImageLocal($image, $path, $imageName, $disk)
    {
        $image->storeAs($path, $imageName, ['disk' => $disk]);
    }

    private function GenerateNewName($image)
    {
        $imageName = Str::uuid() . time() . $image->getClientOriginalExtension();
        return $imageName;
    }

    public function deleteImageFromLocal($image)
    {
        if (File::exists(public_path($image))) {
            File::delete(public_path($image));
        }
    }
}
