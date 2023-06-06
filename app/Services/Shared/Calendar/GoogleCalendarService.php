<?php

namespace App\Services\Shared\Calendar;

use App\Services\Shared\Google\GoogleService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Services\Shared\TokenManager\TokenManagerService;

class GoogleCalendarService
{
     
    public $googleService;
    public $calendar;
    private $tokenManagerService;
    protected $googleReminders;
     
    public function __construct(GoogleService $googleService, TokenManagerService $tokenManagerService)
    {
        $this->googleService = $googleService;
        $this->tokenManagerService = $tokenManagerService;
        $this->calendar = new \Google_Service_Calendar($this->googleService->client());
        $this->googleReminders = [
            'useDefault' => false,
            'overrides'  => [
                ['method' => 'email', 'minutes' => 24 * 60],
                ['method' => 'popup', 'minutes' => 60],
            ],
        ];
    }
     
     
      /**
     * Google OAuth Login Url
     *
     * @return void
     */
    public function loginUrl()
    {
        return $this->googleService->loginUrl();
    }


    public function login($code)
    {
        try {
            $login = $this->googleService->client->authenticate($code);
        } catch (\Exception $e) {
            Log::info('unauthorized_url_settings'. $e);
        }
        if (isset($login['error_description']) && $login['error_description'] == 'Unauthorized') {
            Log::info('unauthorized_url_settings');
        }

        if ($login) {
            $user_id = auth()->user()->id;
            $result = $this->tokenManagerService->getByUserId($user_id, 'google');
            if ($result) {
                $this->tokenManagerService->update($result->id, [
                    'access_token'  => $login['access_token'],
                    'expires_in'    => time() + $login['expires_in'],
                    'refresh_token' => $login['refresh_token'],
                ]);
            } else {
                if (isset($login['refresh_token'])) {
                    $this->tokenManagerService->create([
                        'name'         => 'google',
                        'user_id'      => $user_id,
                        'access_token'  => $login['access_token'],
                        'refresh_token' => $login['refresh_token'],
                        'expires_in'    => time() + $login['expires_in']
                    ]);
                } else {
                    $this->tokenManagerService->create([
                        'name'         => 'google',
                        'user_id'      => $user_id,
                        'access_token'  => $login['access_token'],
                        'expires_in'    => time() + $login['expires_in']
                    ]);
                }
            }
            
            $token = $this->googleService->client->getAccessToken();

            $this->googleService->client->setAccessToken($token);

            $this->saveNewTokenValues($token);

            return true;
        }
        return false;
    }
    
    
    /**
     * Google Calendar get events
     *
     * @return array
     */
    public function getEvents($calendarId = 'primary', $timeMin = false, $timeMax = false, $maxResults = 200)
    {

        if (!$timeMin) {
            $timeMin = date("c", strtotime("-6 months", strtotime(date('Y-m-d') . ' 00:00:00')));
        } else {
            $timeMin = date("c", strtotime($timeMin));
        }


        if (!$timeMax) {
            $timeMax = date("c", strtotime("+6 months", strtotime(date('Y-m-d') . ' 23:59:59')));
        } else {
            $timeMax = date("c", strtotime($timeMax));
        }

        $optParams = [
            'maxResults'   => $maxResults,
            'orderBy'      => 'startTime',
            'singleEvents' => true,
            'timeMin'      => $timeMin,
            'timeMax'      => $timeMax,
            'timeZone'     => get_option('default_timezone'),

        ];

        /**
         * Optional: Get all events
         */
        // $results = $this->googlecalendar->calendar->events->listEvents($calendarId);

        /**
         * Get all events from past 12 months START FROM CURRENT MONTH
         */
        $results = $this->calendar->events->listEvents($calendarId, $optParams);

        $data = [];

        foreach ($results->getItems() as $item) {
            array_push(
                $data,
                [

                    'id'          => $item->getId(),
                    'summary'     => $item->getSummary(),
                    'description' => $item->getDescription(),
                    'creator'     => $item->getCreator(),
                    'start'       => $item->getStart()->dateTime,
                    'end'         => $item->getEnd()->dateTime,
                ]
            );
        }

        return $data;
    }


    public function addEvent($calendarId = 'primary', $data)
    {
        $event = $this->fillGoogleCalendarEvent($data);
        return $this->calendar->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);
    }
    
    
    public function updateEvent($eventid, $data)
    {
        $event = $this->fillGoogleCalendarEvent($data);
        return $this->calendar->events->update('primary', $eventid, $event);
    }

    
    public function deleteEvent($eventid)
    {
        try {
            $this->calendar->events->delete('primary', $eventid);
        } catch (Exception $e) {
            /**
             * This means that event is not found and return true so error will be not thrown
             * Just a percusion when relogging with gmail accounts sometimes can get messy
             */
            if ($e->getCode() === 404) {
                return true;
            }
        }
    }
    
    function fillGoogleCalendarEvent($data)
    {
        $event = new \Google_Service_Calendar_Event(
            [
                'summary'        => $data['summary'],
                'description'    => $data['description'],
                'location'       => ($data['location']) ? $data['location'] : '',
                'sendUpdates'    => 'all',
                'start'          => [
                    'dateTime' => $data['start'],
                    'timeZone' => 'Asia/Colombo',
                ],
                'end'            => [
                    'dateTime' => $data['start'],
                    'timeZone' =>'Asia/Colombo',
                ],
                'attendees'      => (array)$data['attendees'],
                'reminders'      => $this->googleReminders,
                'conferenceData' => [
                    "createRequest" => [
                        "conferenceSolutionKey" => ["type" => "hangoutsMeet"],
                        "requestId"             => Str::random(9).time()
                    ]
                ]
            ]
        );

        return $event;
    }
    
    
    public function getUserInfo()
    {
        return $this->googleService->getUser();
    }
    
    
    public function saveNewTokenValues($data)
    {
        $user_id = auth()->user()->id;
        $result = $this->tokenManagerService->getByUserId($user_id, 'google');
        $this->tokenManagerService->update($result->id, [
            'refresh_token' => isset($data['refresh_token']) ? $data['refresh_token'] : '' ,
            'access_token'  => $data['access_token'],
            'expires_in'    => time() + $data['expires_in']
        ]);
    }
}
