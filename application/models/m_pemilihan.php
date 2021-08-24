<?php

class M_Pemilihan extends CI_Model{
    public function get_data(){
        return $this->db->get('pemilihan')-> result_array();
    }

    public function get_data_pemilihan($tahun){
        $this->load->database();
        //$query = $this->db->get_where('pemilihan', array('tahun' => $tahun));
        
        $this->db->where('periode', $tahun);
        $query = $this->db->get('pemilihan');
        return $query->result();
    }

    public function get_start_time(){
        $this->load->database();
        $query = $this->db->select('start_time')->order_by('start_time','desc')->limit(1)->get('pemilihan')->row('start_time');
        return $query;
    }

    public function get_end_time(){
        $this->load->database();
        $query = $this->db->select('end_time')->order_by('end_time','desc')->limit(1)->get('pemilihan')->row('end_time');
        return $query;
    }

    public function get_periode(){
        $this->load->database();
        $query = $this->db->select('periode')->order_by('periode','desc')->limit(1)->get('pemilihan')->row('periode');
        return $query;
    }

    public function get_hasil_pemilihan($ID_ketua){
        $this->load->database();
        $query = $this->db->where(['ID_ketua'=>$ID_ketua])->from("mahasiswa")->count_all_results();
        return $query;
    }

    function set_waktu_pemilihan($tahun, $start_time, $end_time){
        $this->load->database();
        $data = array(
			'periode' => $tahun,
            'start_time' => $start_time,
            'end_time' => $end_time,
		);
		$this->db->insert('pemilihan', $data);
    }
   
}