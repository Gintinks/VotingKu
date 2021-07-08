<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}


	function signup($Nama, $NIM, $email, $Password){
		$this->load->database(); 
		
		$data = array(
			'nama' => $Nama,
			'NIM' => $NIM,
			'email' => $email,
			'Password' => $Password,
			'sudah_milih' => 0,
			'ID_ketua' => null
		);
		$this->db->insert('mahasiswa', $data);
	}	
}