<?php 

class MainAdmin extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "loginAdmin"){
			redirect(base_url("login"));
		}
	}
	//coba
	function index(){
		$this->load->helper('url');
		$this->load->model('m_admin');
		$this->load->model('m_calon');
		$this->load->model('m_mahasiswa');
	//	$posts2 = $this->m_calon->get_data_calon();
		$posts = $this->m_admin->get_data_admin($this->session->userdata('username'));
		$posts2 = $this->m_calon->get_data();
		$posts3 = $this->m_mahasiswa->get_data_unverified();
		$data['posts'] = $posts;
		$data['posts2']	= $posts2;
		$data['posts3'] = $posts3;
		$this->load->view('home_admin', $data);
	}
	

	function tambah_calon(){
		$this->load->view('tambah_calon');
	}
	function simpan_calon(){
		$this->load->helper('url');
		$this->load->model('m_calon');
		$nama = $this->input->post('nama');
		$tempat = $this->input->post('tempat');
		$tanggal = $this->input->post('tanggal');
		$deskripsi = $this->input->post('deskripsi');
		$gender = $this->input->post('gender');
		$daftar_prestasi = $this->input->post('daftar_prestasi');
		$foto = $this->input->post('customFileInput');
		$this->m_calon->tambah_calon($nama, $tempat, $tanggal, $deskripsi, $gender, $daftar_prestasi, $foto);
		redirect(base_url("mainAdmin"));
	}
	function ubah_calon(){
		$this->load->helper('url');
		$this->load->model('m_calon');
		$id = $this->input->post('ID_ketua');
		$nama = $this->input->post('nama');
		$tempat = $this->input->post('tempat');
		$tanggal = $this->input->post('tanggal');
		$deskripsi = $this->input->post('deskripsi');
		$gender = $this->input->post('gender');
		$daftar_prestasi = $this->input->post('daftar_prestasi');
		$foto = $this->input->post('customFileInput');
		$this->m_calon->update_calon($id,$nama, $tempat, $tanggal, $deskripsi, $gender, $daftar_prestasi, $foto);
		redirect(base_url("mainAdmin"));
	}
	function update_calon(){
		$this->load->helper('url');
		$this->load->model('m_calon');
		$posts2 = $this->m_calon->get_data_calon($this->input->post('ID_ketua'));
		$data['posts'] = $posts2;
		$this->load->view('edit_calon',$data);
	}
	function delete(){
		$this->load->model('m_calon');
		$this->load->model('m_mahasiswa');
		$ID_ketua = $this->input->post('ID_ketua');
		$this->m_mahasiswa->delete_pilih($ID_ketua);
        $this->m_calon->delete($ID_ketua);
        redirect(base_url('MainAdmin'));
	}
	function set_waktu_pemilihan(){
		$this->load->helper('url');
		$this->load->model('m_pemilihan');
		$start_time = $this->input->post('tanggalAwal');
		$end_time = $this->input->post('tanggalAkhir');
		$tahun = 2020;
		$this->m_pemilihan->set_waktu_pemilihan($tahun, $start_time, $end_time);
		redirect(base_url('MainAdmin'));
	}
	function verifikasi(){
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$NIM = $this->input->post('verifikasi');
		$this->m_mahasiswa->set_data_verified($NIM);
		redirect(base_url('MainAdmin'));
	}
}