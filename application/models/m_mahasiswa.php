<?php

class M_mahasiswa extends CI_Model{
    public function get_data(){
        return $this->db->get('mahasiswa')-> result_array();
    }
    public function get_data_unverified(){
        $this->load->database();
        $query = $this->db->get('mahasiswa', array('verified' == 0));
        
        $this->db->where('verified', 0);
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }

    public function set_data_verified($nim,$verify_code){
        $this->load->database();
        $this->db->query("UPDATE mahasiswa SET verified = 1 WHERE NIM = '$nim'");

 
		//fetch user details
		$user = $this->get_data_mahasiswa($nim);
 
		//if code matches
		if($user['verify_code'] == $verify_code){
			//update user active status
            $this->db->query("UPDATE mahasiswa SET verified = 1 WHERE NIM = '$nim'");
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}
    }
    
    public function get_data_mahasiswa($nim){
        $this->load->database();
        $query = $this->db->get_where('mahasiswa', array('NIM' => $nim));
        return $query->result();
    }

    public function set_telah_memilih($nim, $pilihan){
        $this->load->database();
        $this->db->query("UPDATE mahasiswa SET sudah_milih = '1'  WHERE NIM = '$nim'");
        $this->db->query("UPDATE mahasiswa SET ID_ketua = '$pilihan' WHERE NIM = '$nim'");
    }

    function delete_pilih($ID_ketua){
        $this->load->database();
        $this->db->query("UPDATE mahasiswa SET ID_ketua = null WHERE ID_ketua = '$ID_ketua'");
    }
   
}
