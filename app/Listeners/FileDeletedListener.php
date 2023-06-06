<?php

namespace App\Listeners;

use App\Events\FileDeleted;
use App\Services\Shared\File\FileServiceInterface;

class FileDeletedListener
{
    private $fileService;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(FileServiceInterface  $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(FileDeleted $event)
    {
        $this->fileService->deleteData($event->file);
    }
}
