<?php

class M_partner extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_partner() {
        $this->db->select('*');
        $this->db->from('tbl_partner');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return '';
        }
    }

    function add_partner($post) {

        if ($post['cr_type'] == 'save') {
            $data = array(
                'partner_name' => $post['partner_name'],
                'partner_id' => $post['partner_id']
            );
            $this->db->insert('tbl_partner', $data);
            $pid = $this->db->insert_id();
            if ($pid) {
                return $pid;
            } else {
                return '';
            }
        } else if ($post['cr_type'] == 'update') {
            $set_array = array(
                'partner_name' => $post['partner_name'],
                'partner_id' => $post['partner_id']
            );
            $this->db->update('tbl_partner', $set_array, array('tbl_partner_id' => $post['tbl_partner_id']));
            if ($this->db->affected_rows()) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}
