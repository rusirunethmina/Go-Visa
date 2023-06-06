<?php

namespace App\Services\Frontend\Settings;

use Illuminate\Support\Facades\Hash;

class SettingsService
{
  
    public function updatePasswordChange($data)
    {
        try {
            auth()->user()->update([
                'password' => Hash::make($data['password'])
            ]);
            return redirect()->back()->with('success', 'Password has been updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
    }
}
