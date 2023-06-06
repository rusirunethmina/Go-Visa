<?php

namespace App\Services\Shared\Google;

use App\Services\Shared\TokenManager\TokenManagerService;

class GoogleService
{

    public $client;

    public function __construct()
    {
        $this->initGoogleClient();
    }

    public function client()
    {
        return $this->client;
    }

    /**
     * @return mixed
     */
    public function loginUrl()
    {
        return $this->client->createAuthUrl();
    }


    /**
     * @return mixed
     */
    public function getAuthenticate()
    {
        return $this->client->authenticate();
    }


    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->client->getAccessToken();
    }


    /**
     * @param $token
     *
     * @return mixed
     */
    public function setAccessToken($token)
    {
        return $this->client->setAccessToken($token);
    }

    /**
     * @param $token
     *
     * @return mixed
     */
    public function refreshToken($token)
    {
        return $this->client->refreshToken($token);
    }

    /**
     * @return mixed
     */
    public function isAccessTokenExpired()
    {
        return $this->client->isAccessTokenExpired();
    }

    /**
     * @return mixed
     */
    public function revokeToken(TokenManagerService $tokenManagerService)
    {

        $user_id = auth()->user()->id;
        $key = $this->tokenManagerService->getByUserId($user_id, 'google');
        $token = $this->client->setAccessToken('Bearer');
        $this->tokenManagerService->delete($$key->id);
        return $this->client->revokeToken($token);
    }


    private function initGoogleClient()
    {
        $this->client = new \Google_Client();
        $this->client->setAccessType("offline");
        $this->client->setApprovalPrompt("force");
        $this->client->setApplicationName('GoVisa');
        $this->client->setClientId(config('services.gcp.clientid'));
        $this->client->setClientSecret(config('services.gcp.secret'));
        $this->client->setRedirectUri('https://govisanew.godigitaliz.com/google/callback');
        $this->client->addScope(\Google_Service_Calendar::CALENDAR);
    }
}
