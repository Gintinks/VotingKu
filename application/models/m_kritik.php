<?php 

class M_kritik extends CI_Model{	
	function simpan_kritik($isi_kritik){
		$this->load->database();
		$data = array(
			'isi_kritik' => $isi_kritik
		);
		$this->db->insert('kritik', $data);
	}
	function get_kritik(){
		$this->load->database();
        $query = $this->db->get('kritik');
        return $query->result();
	}
}