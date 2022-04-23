<?php

namespace App\Traits;

use function PHPUnit\Framework\isEmpty;

use Illuminate\Support\Facades\Storage;

trait FileUpload
{



    public function uploadImageInStorage($ImageRequest, $Folder): string
    {
        $newImageName = $this->generateUniqueImageName($ImageRequest);


        if (app()->environment('production')) {
            $path =    $ImageRequest->storeAs('images/' . $Folder, $newImageName, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
        } else {
            $ImageRequest->storeAs('public/images/' . $Folder, $newImageName);
        }
        return $newImageName;
    }

    public function generateUniqueImageName($ImageRequest): string
    {
        $time = date("d-m-y-H-i-s") . "-" . time();
        $NewImageName =   $time . '-' . str_replace(' ', '-',  $ImageRequest->getClientOriginalName());
        return $NewImageName;
    }

    public function deletePreviousImage($imagePath)
    {

        $fullPath = 'images/' . $imagePath;

        if ($this->isImageExists($fullPath)) {
            if (app()->environment('production')) {
                Storage::disk('s3')->delete($fullPath);
            } else {
                Storage::disk('local')->delete('public/' . $fullPath);
            }
        }
    }
    public function isImageExists($fullPath)
    {
        if (app()->environment('production')) {
            return Storage::disk('s3')->exists($fullPath);
        } else {
            return Storage::exists('public/' . $fullPath);
        }
    }
    public function destroyModelWithImage($model, $imagePath)
    {
        $fullPath = 'images/' . $imagePath;
        $model->delete();

        if (app()->environment('production')) {
            Storage::disk('s3')->delete($fullPath);
        } else {
            Storage::disk('local')->delete('public/' . $fullPath);
        }
    }
}