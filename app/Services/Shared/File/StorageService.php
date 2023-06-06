<?php


namespace App\Services\Shared\File;

use App\Services\Shared\File\StorageServiceInterface;
use Illuminate\Support\Facades\Log;

class StorageService implements StorageServiceInterface
{
    private $disk;
    public function __construct($disk)
    {
        $this->disk = $disk;
    }

    public function upload($file, $storage_container)
    {
        try {
            $path = $this->disk->put($storage_container, $file);
            return $path;
        } catch (\Exception $e) {
            Log::error('Unable to upload file', ['error' => $e]);
            throw $e;
        }
    }

    public function delete($path)
    {
        try {
            $this->disk->delete($path);
        } catch (\Exception $e) {
            Log::error('Unable to delete file', ['error' => $e]);
            throw $e;
        }
    }

    public function download($path)
    {
        try {
            return $this->disk->download($path);
        } catch (\Exception $exception) {
            Log::error('Unable to download file', ['error' => $exception->getMessage()]);
            throw $exception;
        }
    }

    public function url($path)
    {
        return $this->disk->url($path);
    }

    public function exists($path)
    {
        return $this->disk->exists($path);
    }

    public function get($path)
    {
        if ($this->exists($path)) {
            return $this->disk->get($path);
        } else {
            throw new \Exception("File does not exist");
        }
    }

    public function move($from, $to)
    {
        if ($this->exists($from)) {
            $this->disk->move($from, $to);
        } else {
            throw new \Exception("File does not exist");
        }
    }

    public function size($path)
    {
        if ($this->exists($path)) {
            return $this->disk->size($path);
        } else {
            throw new \Exception("File does not exist");
        }
    }
}
