<?php
namespace App\Traits;

trait AuthTrait
{

    public function getActiveRole()
    {
        return auth()->user()->role;
    }

    public function getCurrentUser()
    {
        return auth()->user();
    }

    public function hasProviderRole($role) : bool
    {
        return ($role == "provider") ? true : false;
    }
}
