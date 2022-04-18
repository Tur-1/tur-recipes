<?php

namespace App\Traits;

use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Storage;

trait FileUpload
{



    public function uploadImageInStorage($ImageRequest, $Folder): string
    {
        $newImageName = $this->generateUniqueImageName($ImageRequest);

        $ImageRequest->storeAs('public/images/' . $Folder, $newImageName);

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

            Storage::disk('local')->delete('public/images/' . $imagePath);
        }
    }
    public function isImageExists($imagePath)
    {

        return Storage::exists('public/images/' . $imagePath);
    }
    public function destroyModelWithImage($model, $imagePath)
    {
        $model->delete();
        if (isEmpty($model)) {

            Storage::disk('local')->delete('public/images/' . $imagePath);
        }
    }
}