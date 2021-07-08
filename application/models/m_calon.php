<?php
//tes
class M_Calon extends CI_Model{
    public function get_data(){

         $this->load->database();
         $query = $this->db->get('calon_ketua');
         return $query->result();
        //return $this->db->get('calon_ketua')-> result_array();
    }

    public function get_data_calon($ID_ketua){
        $this->load->database();
        $query = $this->db->get_where('calon_ketua', array('ID_ketua' => $ID_ketua));
        return $query->result();
    }
    public function get_data_calon_byName($nama){
        $this->load->database();
        $query = $this->db->get_where('calon_ketua', array('nama' => $nama));
        return $query->result();
    }
    public function addVote($ID_ketua){
        $this->load->database();
        $posts = $this->m_calon->get_data_calon($ID_ketua);
        $jumlah_pemilih = 0;
        foreach ($posts as $post):
            $jumlah_pemilih = $post->jumlah_pemilih + 1;
        endforeach;
        $this->db->query("UPDATE calon_ketua SET jumlah_pemilih = '$jumlah_pemilih' WHERE ID_ketua = '$ID_ketua'");
    }
    public function tambah_calon($nama, $tempat, $tanggal, $deskripsi, $jenis_kelamin, $daftar_prestasi, $foto){
        $this->load->database();
        if($jenis_kelamin=="Laki-laki"){
            $jenis_kelamin = 'L';
        } else{
            $jenis_kelamin = 'P';
        }
        $data = array(
			'nama' => $nama,
            'tempat' => $tempat,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'jenis_kelamin' => $jenis_kelamin,
            'daftar_prestasi' => $daftar_prestasi,
            'foto' => $foto,
            'jumlah_pemilih' => 0
		);
		$this->db->insert('calon_ketua', $data);
    }
    public function update_calon($id, $nama, $tempat, $tanggal, $deskripsi, $jenis_kelamin, $daftar_prestasi, $foto){
        $this->load->database();
        if($jenis_kelamin=="Laki-laki"){
            $jenis_kelamin = 'L';
        } else{
            $jenis_kelamin = 'P';
        }
        $data = array(
			'nama' => $nama,
            'tempat' => $tempat,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'jenis_kelamin' => $jenis_kelamin,
            'daftar_prestasi' => $daftar_prestasi,
            'foto' => $foto,
            'jumlah_pemilih' => 0
        );
        $this->db->table('calon_ketua')->update($data, array('ID_ketua' => $id));
    }
    function delete($ID_ketua){
        $this->load->database();
        $this->db->delete('calon_ketua', array('ID_ketua' => $ID_ketua));
    }
   
}
