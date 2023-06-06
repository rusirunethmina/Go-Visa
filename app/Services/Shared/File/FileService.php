<?php


namespace App\Services\Shared\File;

use App\Services\Shared\File\StorageServiceInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileService implements FileServiceInterface
{
    private $storageService;
    
    public function __construct(StorageServiceInterface $storageService)
    {
        $this->storageService = $storageService;
    }

    public function getData($id)
    {
        //return File::findorfail($id);
    }

    public function createData($uploadedFile, $storage_container)
    {
        try {
            $file                 = [];
            $path                 = $this->storageService->upload($uploadedFile, "files/" . $storage_container);
            $file['filename']     = $uploadedFile->hashName();
            $file['public_path']  = $this->storageService->url($path);
            $file['path']         = $path;
            $file['type']         = $uploadedFile->getClientOriginalExtension();
            return $file;
        } catch (\Exception $e) {
            Log::error('Unable to create file', ['error' => $e]);
            throw $e;
        }
    }

    public function deleteData($file)
    {
        try {
            $this->storageService->delete($file);
        } catch (\Exception $e) {
            Log::error('Unable to delete file', ['error' => $e]);
        }
    }
}
