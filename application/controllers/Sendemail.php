<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sendemail extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://444-cqd-069.mktorest.com/identity/oauth/token?grant_type=client_credentials&client_id=e31261cd-7b6f-4a93-b563-d18efb539c8b&client_secret=bUKrsoXPRb4kDW6HCzIFV7QZwDRxeW2d",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST"
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        if (!empty($response)) {
            if (isset($response->access_token)) {
                if ($response->access_token != "") {
                    $requestBody = "&emailAddress=vishaltesting16@gmail.com";
                    $requestBody .= "&textOnly=Test Email";
                    $requestBody .= "&leadId=16";
                    $id = 1529;
                     $url = "https://444-cqd-069.mktorest.com/rest/asset/v1/email/" . $id . "/sendSample.json?access_token=" . $response->access_token;
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('accept: application/json'));
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
                    curl_getinfo($ch);
                    $response = curl_exec($ch);
                    echo "<pre>";
                    print_r($response);
                    die;
                }
            }
        }
    }

}
