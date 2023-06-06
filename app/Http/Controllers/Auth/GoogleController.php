<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Shared\Google\GoogleService;
use App\Services\Shared\Calendar\GoogleCalendarService;
use App\Services\Shared\Calendar\GoogleAuth;
use Illuminate\Support\Facades\Log;
use App\Services\Shared\TokenManager\TokenManagerService;

class GoogleController extends Controller
{

    private $googleService;
    private $googlecalendar;
    private $tokenManagerService;

    public function __construct(GoogleService $googleService, GoogleCalendarService $googleCalendar, TokenManagerService $tokenManagerService)
    {
        $this->googleService = $googleService;
        $this->googlecalendar = $googleCalendar;
        $this->tokenManagerService = $tokenManagerService;
    }

    public function connect(GoogleAuth $googleAuth)
    {
        $data = array('loginUrl' => $this->googleService->loginUrl());
        if (!$googleAuth->checkGoogleAuth($this->googleService, $this->tokenManagerService, $this->googlecalendar)) {
            return redirect()->away($data['loginUrl']);
        } else {
            return redirect()->route('account.booking');
        }
    }

    public function callback(Request $request)
    {
        if (!$request->has('code')) {
            $this->connect();
        }
        $code = $request->get('code');
        $this->googlecalendar->login($code);
        return redirect()->route('account.booking');
    }
    
    public function logout()
    {
        $this->googleService->revokeToken();
        return redirect()->route('account.booking');
    }
}
