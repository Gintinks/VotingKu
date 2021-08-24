<?php
//tes
class M_Calon extends CI_Model
{
    public function get_data()
    {
        $this->load->database();
        $periode = $this->db->select('periode')->order_by('periode', 'desc')->limit(1)->get('pemilihan')->row('periode');
        $query = $this->db->get_where('calon_ketua', array('periode' => $periode));
        return $query->result();
        //return $this->db->get('calon_ketua')-> result_array();
    }

    public function get_data_calon($ID_ketua)
    {
        $this->load->database();
        $where = array(
            'ID_ketua' => $ID_ketua,
            'periode' => $this->db->select('periode')->order_by('periode', 'desc')->limit(1)->get('pemilihan')->row('periode')
        );
        $query = $this->db->get_where('calon_ketua', $where);
        return $query->result();
    }

    public function get_data_winner()
    {
        $this->load->database();
        $query = $this->db->select_max('jumlah_pemilih', 'ID_ketua')->get('calon_ketua')->row();
        return $query;
    }

    public function get_data_calon_byName($nama)
    {
        $this->load->database();
        $query = $this->db->get_where('calon_ketua', array('nama' => $nama));
        return $query->result();
    }
    public function addVote($ID_ketua)
    {
        $this->load->database();
        $posts = $this->m_calon->get_data_calon($ID_ketua);
        $jumlah_pemilih = 0;
        foreach ($posts as $post) :
            $jumlah_pemilih = $post->jumlah_pemilih + 1;
        endforeach;
        $this->db->query("UPDATE calon_ketua SET jumlah_pemilih = '$jumlah_pemilih' WHERE ID_ketua = '$ID_ketua'");
    }
    public function tambah_calon(
        $ID_ketua,
        $NIM2,
        $nama,
        $nama2,
        $tempat,
        $tanggal,
        $deskripsi,
        $jenis_kelamin,
        $jenis_kelamin2,
        $daftar_prestasi,
        $foto,
        $password,
        $password2,
        $periode,
        $email,
        $email2
    ) {
        $this->load->database();
        if ($jenis_kelamin == "Laki-laki") {
            $jenis_kelamin = 'L';
        } else {
            $jenis_kelamin = 'P';
        }
        if ($jenis_kelamin2 == "Laki-laki") {
            $jenis_kelamin2 = 'L';
        } else {
            $jenis_kelamin2 = 'P';
        }
        $data = array(
            'ID_ketua' => $ID_ketua,
            'NIM2' => $NIM2,
            'nama' => $nama,
            'nama2' => $nama2,
            'tempat' => $tempat,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'jenis_kelamin' => $jenis_kelamin,
            'jenis_kelamin2' => $jenis_kelamin2,
            'daftar_prestasi' => $daftar_prestasi,
            'foto' => $foto,
            'password' => $password,
            'password2' => $password2,
            'periode' => $periode,
            'jumlah_pemilih' => 0,
            'email' => $email,
            'email2' => $email2
        );
        $this->db->insert('calon_ketua', $data);
    }
    public function update_calon(
        $ID_ketua,
        $NIM2,
        $nama,
        $nama2,
        $tempat,
        $tanggal,
        $deskripsi,
        $jenis_kelamin,
        $jenis_kelamin2,
        $daftar_prestasi,
        $foto,
        $password,
        $password2,
        $periode,
        $email,
        $email2
    ) {
        $this->load->database();
        if ($jenis_kelamin == "Laki-laki") {
            $jenis_kelamin = 'L';
        } else {
            $jenis_kelamin = 'P';
        }
        if ($jenis_kelamin2 == "Laki-laki") {
            $jenis_kelamin2 = 'L';
        } else {
            $jenis_kelamin2 = 'P';
        }
        $data = array(
            'ID_ketua' => $ID_ketua,
            'NIM2' => $NIM2,
            'nama' => $nama,
            'nama2' => $nama2,
            'tempat' => $tempat,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'jenis_kelamin' => $jenis_kelamin,
            'jenis_kelamin2' => $jenis_kelamin2,
            'daftar_prestasi' => $daftar_prestasi,
            'foto' => $foto,
            'password' => $password,
            'password2' => $password2,
            'periode' => $periode,
            'jumlah_pemilih' => 0,
            'email' => $email,
            'email2' => $email2
        );
        $this->db->table('calon_ketua')->update($data, array('ID_ketua' => $ID_ketua));
    }
    function delete($ID_ketua)
    {
        $this->load->database();
        $this->db->delete('calon_ketua', array('ID_ketua' => $ID_ketua));
    }
}
