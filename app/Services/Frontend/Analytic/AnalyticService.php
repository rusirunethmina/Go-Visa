<?php

namespace App\Services\Frontend\Analytic;

use App\Models\Analytic;
use Carbon\Carbon;

class AnalyticService
{
  
    public function track($provider_id, $user_id)
    {
        $todayVisit = $this->checkTodayVisit($provider_id, $user_id);
        if ($todayVisit) {
            $todayVisit->increment('visits');
        } else {
            $this->createNewVisitor($provider_id, $user_id);
        }
    }

    public function getDailyVisits($provider_id)
    {
        return Analytic::where('provider_id', $provider_id)->whereDate('created_at', Carbon::today())->get();
    }

    public function getDailyVisitsCount($provider_id)
    {
        return Analytic::where('provider_id', $provider_id)->whereDate('created_at', Carbon::today())->sum('visits');
    }

    private function checkTodayVisit($provider_id, $user_id)
    {
        return Analytic::where('provider_id', $provider_id)->where('user_id', $user_id)->whereDate('created_at', Carbon::today())->first();
    }

    private function createNewVisitor($provider_id, $user_id)
    {
        return Analytic::create(['provider_id' => $provider_id, 'user_id' => $user_id, 'visits' => 1]);
    }
}
