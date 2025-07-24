<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{
    public function uploadBukuImage(UploadedFile $file): string
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($file->getClientOriginalExtension(), $allowedExtensions)) {
            throw new \Exception("Ekstensi file tidak didukung.");
        }

        return $file->store('public');
    }
}
