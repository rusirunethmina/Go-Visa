<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;
use App\Services\Frontend\Analytic\AnalyticService;

class DashboardController extends Controller
{

    use AuthTrait;

    public function __construct()
    {
    }

    public function index(AnalyticService $analyticService)
    {
        $current_user = $this->getCurrentUser();

        $data = compact('current_user');

        $views = collect();

        if ($this->hasProviderRole($current_user->role)) {
            $role_data = [];

            $profile = $current_user->profile;

            $analytics = $analyticService->getDailyVisits($current_user->id);

            $visit_count = $analyticService->getDailyVisitsCount($current_user->id);

            $role_data = compact('profile', 'analytics', 'visit_count');

            $data = array_merge($data, $role_data);
        
            $view = 'frontend.account.dashboard.provider.index';

            $views->push($view);
        } else {
            $role_data = [];

            $profile = $current_user->profile;

            $role_data = compact('profile');
            
            $data = array_merge($data, $role_data);

            $view = 'frontend.account.dashboard.default.index';

            $views->push($view);
        }

        return view()->first($views->toArray())->with($data);
    }
}
