<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setlocation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $this->load->model('user/m_register', 'objregister');
    }

    public function index() {
        $data['cust_id'] = base64_decode($this->input->get("id"));
        $data['type'] = $this->input->get("type");
        $data['partner_id'] = "";
        $this->load->view('main_header');
        $this->load->view('set_location', $data);
        $this->load->view('footer');
    }

    public function update_location() {
        $post = $this->input->post();
        $id = $this->objregister->update_location($post);
        echo json_encode(array("status" => "success", "cust_id" => $id, "type" => $post['type']));
    }

}
