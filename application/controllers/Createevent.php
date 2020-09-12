<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
define('STDIN',fopen("php://stdin","r"));
class Createevent extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
    }

    public function index() {
        require FCPATH . 'calendar_lib/vendor/autoload.php';
        function getClient() {
            $client = new Google_Client();

            $client->setApplicationName('Google Calendar API PHP Quickstart');

            $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);

            $client->setAuthConfig(FCPATH . 'calendar_lib/credentials.json');

            $client->setAccessType('offline');
            $client->setPrompt('select_account consent');

            $tokenPath = FCPATH . 'calendar_lib/token.json';
            $tokenPath = "";

            if (file_exists($tokenPath)) {
                $accessToken = json_decode(file_get_contents($tokenPath), true);
                $client->setAccessToken($accessToken);
            }

            // If there is no previous token or it's expired.
            if ($client->isAccessTokenExpired()) {
                // Refresh the token if possible, else fetch a new one.
                if ($client->getRefreshToken()) {
                    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                } else {
                    // Request authorization from the user.
                    $authUrl = $client->createAuthUrl();

                    printf("Open the following link in your browser:\n%s\n", $authUrl);
                    print 'Enter verification code: ';

                    $authCode = trim(fgets(STDIN));
                   
                    // Exchange authorization code for an access token.
                    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                    $client->setAccessToken($accessToken);

                    // Check to see if there was an error.
                    if (array_key_exists('error', $accessToken)) {
                        throw new Exception(join(', ', $accessToken));
                    }
                }
                // Save the token to a file.
                if (!file_exists(dirname($tokenPath))) {
                    mkdir(dirname($tokenPath), 0700, true);
                }
                file_put_contents($tokenPath, json_encode($client->getAccessToken()));
            }
            return $client;
        }

        // Get the API client and construct the service object.
        $client = getClient();

        //   $service = new Google_Service_Calendar($client);
        // Print the next 10 events on the user's calendar.
        $event = new Google_Service_Calendar_Event(array(
            'summary' => 'Google I/O 2020',
            'location' => '800 Howard St., San Francisco, CA 94103',
            'description' => 'A chance to hear more about Google\'s developer products.',
            'start' => array(
                'dateTime' => '2020-09-28T09:00:00-07:00',
                'timeZone' => 'America/Los_Angeles',
            ),
            'end' => array(
                'dateTime' => '2020-09-28T17:00:00-07:00',
                'timeZone' => 'America/Los_Angeles',
            ),
            'recurrence' => array(
                'RRULE:FREQ=DAILY;COUNT=2'
            ),
            'attendees' => array(
                array('email' => 'vishaltesting14@gmail.com'),
                array('email' => 'vishaltesting10@gmail.com'),
            ),
            'reminders' => array(
                'useDefault' => FALSE,
                'overrides' => array(
                    array('method' => 'email', 'minutes' => 24 * 60),
                    array('method' => 'popup', 'minutes' => 10),
                ),
            ),
        ));

        $calendarId = 'primary';
        $event = $service->events->insert($calendarId, $event);
        print_r('Event created');
        die;
    }

}
