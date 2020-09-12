<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Partner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_partner', 'mpartner');
    }

    public function index() {
        $data['partner'] = $this->mpartner->get_partner();
        $this->load->view('admin/header');
        $this->load->view('admin/partner', $data);
        $this->load->view('admin/footer');
    }

    public function add_partner() {
        $post = $this->input->post();
        if (!empty($post)) {
            $res = $this->mpartner->add_partner($post);
            if ($res) {
                header('Location: ' . base_url() . 'admin/partner?msg=S');
            } else {
                header('Location: ' . base_url() . 'admin/partner?msg=E');
            }
        }
    }

    public function getPartnerById($pid) {
        $q = $this->db->get_where('tbl_partner', array('tbl_partner_id' => $pid));
        if ($q->num_rows() > 0) {
            $plan = $q->row();
            $data['msg'] = 'success';
            $data['data'] = $plan;
        } else {
            $data['msg'] = 'error';
            $data['data'] = 'Record not found please try again later!';
        }
        echo json_encode($data);
    }

    public function deletePartner($pid) {
        $this->db->delete('tbl_partner', array('tbl_partner_id' => $pid));
        header('Location: ' . base_url() . 'admin/partner?msg=D');
    }

}
