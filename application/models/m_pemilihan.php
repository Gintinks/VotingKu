<?php

class M_Pemilihan extends CI_Model{
    public function get_data(){
        return $this->db->get('pemilihan')-> result_array();
    }

    public function get_data_pemilihan($tahun){
        $this->load->database();
        //$query = $this->db->get_where('pemilihan', array('tahun' => $tahun));
        
        $this->db->where('tahun', $tahun);
        $query = $this->db->get('pemilihan');
        return $query->result();
    }
    function set_waktu_pemilihan($tahun, $start_time, $end_time){
        $this->load->database();
        $data = array(
			'tahun' => $tahun,
            'start_time' => $start_time,
            'end_time' => $end_time,
		);
		$this->db->insert('pemilihan', $data);
    }
   
}