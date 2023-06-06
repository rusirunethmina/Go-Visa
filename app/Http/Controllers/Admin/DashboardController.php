<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\AuthTrait;

class DashboardController extends Controller
{

    use AuthTrait;

    public function index()
    {
        $current_user = $this->getCurrentUser();
        return view('backend.dashboard.index', ['current_user' => $current_user]);
    }
}
