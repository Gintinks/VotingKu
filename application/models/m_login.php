<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}


	function signup($Nama, $NIM, $email, $Password,$verifiy_code){
		$this->load->database(); 
		$this->load->model('m_pemilihan');
		$periode = $this->m_pemilihan->get_periode();
		$data = array(
			'nama' => $Nama,
			'NIM' => $NIM,
			'email' => $email,
			'Password' => $Password,
			'sudah_milih' => 0,
			'ID_ketua' => null,
			'periode' => $periode,
			'verify_code' => $verifiy_code
		);
		$this->db->insert('mahasiswa', $data);
	}

	function signup_admin($Nama, $NIM, $email, $Password){
		$this->load->database(); 
		$this->load->model('m_pemilihan');
		$periode = $this->m_pemilihan->get_periode();
		$data = array(
			'nama' => $Nama,
			'NIM' => $NIM,
			'email' => $email,
			'Password' => $Password,
			'sudah_milih' => 2,
			'verified' => 1,
			'periode' => $periode
		);
		$this->db->insert('mahasiswa', $data);
	}
}