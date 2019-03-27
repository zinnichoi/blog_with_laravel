<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

interface UploadFileServiceInterface
{
    /**
     * Save file
     *
     * @param UploadedFile $file
     * @param string $destinationPath
     * @return null|string
     */
    public function saveFile(UploadedFile $file, string $destinationPath);

    /**
     * Return a file name by timestamp
     *
     * @param string $clientOriginalExtension
     * @return string
     */
    public function createFileName(string $clientOriginalExtension);
}
