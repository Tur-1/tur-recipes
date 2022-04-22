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
        if ($this->isImageExists($imagePath)) {
            if (app()->environment('production')) {
                Storage::disk('s3')->delete($imagePath);
            } else {
                Storage::disk('local')->delete('public/images/' . $imagePath);
            }
        }
    }
    public function isImageExists($imagePath)
    {
        if (app()->environment('production')) {
            return Storage::disk('s3')->exists($imagePath);
        } else {
            return Storage::exists('public/images/' . $imagePath);
        }
    }
    public function destroyModelWithImage($model, $imagePath)
    {
        $model->delete();
        if (isEmpty($model)) {
            if (app()->environment('production')) {
                Storage::disk('s3')->delete($imagePath);
            } else {
                Storage::disk('local')->delete('public/images/' . $imagePath);
            }
        }
    }
}