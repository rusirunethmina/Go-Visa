<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use App\Services\Frontend\Settings\SettingsService;
use App\Http\Requests\Frontend\Settings\UpdatePasswordChangeRequest;

class SettingsController extends Controller
{

    use AuthTrait;


    public function __construct()
    {
    }

    public function changePassword()
    {
        $current_user = $this->getCurrentUser();

        $data = compact('current_user');

        $views = collect();

        if ($this->hasProviderRole($current_user->role)) {
            $role_data = [];

            $profile = $current_user->profile;

            $role_data = compact('profile');

            $data = array_merge($data, $role_data);
        
            $view = 'frontend.account.settings.provider.change_password';

            $views->push($view);
        } else {
            $role_data = [];

            $profile = $current_user->profile;

            $role_data = compact('profile');
            
            $data = array_merge($data, $role_data);

            $view = 'frontend.account.settings.default.change_password';

            $views->push($view);
        }

        return view()->first($views->toArray())->with($data);
    }


    public function updatePasswordChange(UpdatePasswordChangeRequest $request, SettingsService $settingsService)
    {
        $data = $request->validated();
        return $settingsService->updatePasswordChange($data);
    }
}
