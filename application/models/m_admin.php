<?php

class M_admin extends CI_Model{
    public function get_data(){
        return $this->db->get('admin')-> result_array();
    }

    public function get_data_admin($username){
        $this->load->database();
        $query = $this->db->get_where('admin', array('username' => $username));
        return $query->result();
    }
   
}