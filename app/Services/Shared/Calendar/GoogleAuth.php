<?php

namespace App\Services\Shared\Calendar;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GoogleAuth
{

    public function checkGoogleAuth($googleService, $tokenManagerService, $googleCalendarService)
    {
        $user_id = auth()->user()->id;
        $account = $tokenManagerService->getByUserId($user_id, 'google');

        if (!$account) {
            return false;
        }

        $newToken = '';

        if ($account) {
            $currentToken = [
                'access_token' => $account->access_token,
                'expires_in'   => $account->expires_in
            ];

            $googleService->client->setAccessToken($currentToken);

            $refreshToken = $account->refresh_token;
            // renew 5 minutes before token expire
            if ($account->expires_in <= time() + 300) {
                if ($googleService->isAccessTokenExpired()) {
                    $googleService->client->setAccessToken($currentToken);
                }

                if ($refreshToken) {
                    // { "error": "invalid_grant", "error_description": "Token has been expired or revoked." }
                    try {
                        $newToken = $googleService->client->refreshToken($refreshToken);
                    } catch (Exception $e) {
                        if ($e->getCode() === 400) {
                            return false;
                        } elseif ($e->getCode() === 401) {
                            return false;
                        }
                    }

                    $googleService->client->setAccessToken($newToken);

                    if ($newToken) {
                        $googleCalendarService->saveNewTokenValues($newToken);
                    }
                }
            } else {
                try {
                    $newToken = $googleService->client->refreshToken($refreshToken);
                } catch (Exception $e) {
                    if ($e->getCode() === 400) {
                        return false;
                    } elseif ($e->getCode() === 401) {
                        return false;
                    }
                }
            }

            $googleService->client->setAccessToken(($newToken !== '') ? $newToken : $account->access_token);
        }

        if ($googleService->client->getAccessToken()) {
            return $googleService->client->getAccessToken();
        } else {
            return false;
        }
    }
}
