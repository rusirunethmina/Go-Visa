<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use App\Http\Requests\Frontend\Profile\UpdateUserProfileRequest;
use App\Http\Requests\Frontend\Profile\UpdateProviderProfileRequest;
use App\Services\Frontend\Account\AccountService;
use App\Services\Shared\File\FileServiceInterface;
use App\Events\FileDeleted;

class DocumentController extends Controller
{

    use AuthTrait;

    private $fileService;

    public function __construct(FileServiceInterface  $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $current_user = $this->getCurrentUser();

        return view('frontend.account.documents.index', ['current_user' => $current_user]);
    }

    public function updateUser(UpdateUserProfileRequest $request, AccountService $accountService)
    {
        $data = $request->validated();
        if (isset($data['avatar'])) {
            $file = $this->fileService->createData($data['avatar'], 'avatar');
            $data['avatar'] = $file['public_path'];
        }
        return $accountService->updateUserProfile($data);
    }

    public function updateProvider(UpdateProviderProfileRequest $request, AccountService $accountService)
    {
        $data = $request->validated();
        $data = $request->validated();
        if (isset($data['avatar'])) {
            $file = $this->fileService->createData($data['avatar'], 'avatar');
            $data['avatar'] = $file['public_path'];
        }
        return $accountService->updateUserProfile($data);
    }
}
