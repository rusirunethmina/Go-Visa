<?php


namespace App\Services\Shared\File;

interface FileServiceInterface
{
    public function getData($id);

    public function createData($file, $storage_container);

    public function deleteData($id);
}
