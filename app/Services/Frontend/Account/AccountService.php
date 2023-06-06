<?php

namespace App\Services\Frontend\Account;

use App\Models\User;
use App\Enums\User\UserStatus;
use App\Enums\User\UserRole;

class AccountService
{
  
    public function updateUserProfile($data)
    {
        try {
            auth()->user()->profile()->update($data);
            return redirect()->back()->with('success', 'Profile has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
    }

    public function updateProviderProfile($data)
    {
        try {
            auth()->user()->profile()->update($data);
            if (isset($data['locations'])) {
                auth()->user()->locations()->sync($data['locations']);
            }
            return redirect()->back()->with('success', 'Profile has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
    }

    public function getMostRecommendedProviders()
    {
        $providers = User::whereHas('reviews', function ($query){
            $query->orderBy('star', 'asc');
        })
        ->where('status', UserStatus::Active)
        ->where('role', UserRole::Provider)
        ->limit(4)
        ->get();

        $ollcetion = collect($providers)->sortBy(function ($provider, $key) {
            return $provider->review_positve();
        })->reverse();

        return $ollcetion;
    }

    public function getUserBySlug($slug)
    {
        return User::where('slug', $slug)->first();
    }

    public function getRelevantProvidersByLocation($location_id)
    {
        $providers = User::whereHas('profile', function ($query) use ($location_id) {
            $query->where('location_id', $location_id);
        });
        $providers =  $providers->where('status', UserStatus::Active)->where('role', UserRole::Provider)->orderByDesc('id')->limit(4)->get();
        return $providers;
    }

    public function getProvidersByCategory($category)
    {
        return User::where('status', UserStatus::Active)->where('category', $category)->where('role', UserRole::Provider)->orderByDesc('id')->paginate(12);
    }

    public function getSearch($data)
    {
        $query = User::where('status', UserStatus::Active)->where('role', UserRole::Provider);
        if (isset($data['keyword']) and ! empty($data['keyword'])) {
            $query = $query->where('name', 'like', '%'.urldecode($data['keyword']).'%');
        }
        if (isset($data['location']) and !empty($data['location'])) {
            $query = $query->whereHas('profile', function ($q) use ($data) {
                $q->where('location_id', $data['location']);
            });
        }
        $query =  $query->orderByDesc('id')->paginate(12);
        return $query;
    }

    public function categoryFormat($category)
    {
        $formated = $category;
        switch ($category) {
            case 'consultant':
                $formated = 'Consultants';
                break;
            case 'lawyer':
                $formated = 'Lawyers';
                break;
            default:
                $formated = 'Private Colleges';
                break;
        }
        return $formated;
    }
}
