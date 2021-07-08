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
    public function set_data_verified($nim){
        $this->load->database();
        $this->db->query("UPDATE mahasiswa SET verified = 1 WHERE NIM = '$nim'");
    }
    public function get_data_mahasiswa($nim){
        $this->load->database();
        $query = $this->db->get_where('mahasiswa', array('NIM' => $nim));
        return $query->result();
    }

    public function set_telah_memilih($nim, $pilihan){
        $this->load->database();
       
        $this->db->query("UPDATE mahasiswa SET ID_ketua = '$pilihan' WHERE NIM = '$nim'");
    }
    function delete_pilih($ID_ketua){
        $this->load->database();
        $this->db->query("UPDATE mahasiswa SET ID_ketua = null WHERE ID_ketua = '$ID_ketua'");
    }
   
}
