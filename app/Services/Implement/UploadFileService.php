<?php

namespace App\Services\Implement;

use App\Services\UploadFileServiceInterface;
use Illuminate\Http\UploadedFile;

class UploadFileService implements UploadFileServiceInterface
{

    /**
     * If file name existed on database
     *      return a random file name
     * else
     *      save file to destination
     *      return filename
     *
     * @param UploadedFile $file
     * @param $destinationPath
     * @return null|string
     */
    public function saveFile(UploadedFile $file, string $destinationPath)
    {
        $clientOriginalExtension = $file->getClientOriginalExtension();
        $fileName = $this->createFileName($clientOriginalExtension);
        $file->move($destinationPath, $fileName);
        return $fileName;
    }

    /**
     * Return a file name by timestamp
     *
     * @param string $clientOriginalExtension
     * @return string
     */
    public function createFileName(string $clientOriginalExtension)
    {
        return time() . '.' . $clientOriginalExtension;
    }
}
