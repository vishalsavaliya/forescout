<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('auth');
        $this->load->model('googlecalendar');
    }

    public function addEvent() {
        $event = array(
            'summary' => "Forescout Event",
            'start' => "2020-09-21T17:00:00+03:00",
            'end' => "2022-09-22T18:00:00+04:00",
            'description' => "Start Conference October 21",
        );

        $foo = $this->googlecalendar->addEvent('primary', $event);
        if ($foo->status == 'confirmed') {

            $data['message'] = '<div class="alert alert-success">Event saved to your calendar.</div>';
        }

        $this->load->helper('form');
        $this->load->view('main_header');
        $this->load->view('register_message', $data);
        $this->load->view('footer');
    }

    public function eventList() {

    }

}
