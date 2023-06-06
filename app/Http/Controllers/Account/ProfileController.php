<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use App\Http\Requests\Frontend\Profile\UpdateUserProfileRequest;
use App\Http\Requests\Frontend\Profile\UpdateProviderProfileRequest;
use App\Services\Frontend\Account\AccountService;
use App\Services\Shared\File\FileServiceInterface;
use App\Services\Shared\Language\LanguageService;
use App\Services\Shared\Location\LocationService;
use App\Events\FileDeleted;

class ProfileController extends Controller
{

    use AuthTrait;

    private $fileService;

    public function __construct(FileServiceInterface  $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(LanguageService $languageService, LocationService $locationService)
    {
        $current_user = $this->getCurrentUser();

        $data = compact('current_user');

        $views = collect();

        if ($this->hasProviderRole($current_user->role)) {
            $role_data = [];

            $profile = $current_user->profile;

            $languages = $languageService->getAll();

            $locations = $locationService->getAll();

            $profile_languages = json_decode($profile->languages);

            $role_data = compact('profile', 'languages', 'profile_languages', 'locations');

            $data = array_merge($data, $role_data);
        
            $view = 'frontend.account.profile.provider.index';

            $views->push($view);
        } else {
            $role_data = [];

            $profile = $current_user->profile;

            $role_data = compact('profile');
            
            $data = array_merge($data, $role_data);

            $view = 'frontend.account.profile.default.index';

            $views->push($view);
        }

        return view()->first($views->toArray())->with($data);
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

        if (isset($data['avatar'])) {
            $file = $this->fileService->createData($data['avatar'], 'avatar');
            $data['avatar'] = $file['public_path'];
        }
        if (isset($data['hire_thumbnail'])) {
            $file = $this->fileService->createData($data['hire_thumbnail'], 'thumbnails');
            $data['hire_thumbnail'] = $file['public_path'];
        }
        return $accountService->updateProviderProfile($data);
    }
}
