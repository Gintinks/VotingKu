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
	function simpan_jumlah_vote(){
		$this->load->helper('url');
		$this->load->model('m_calon');
		$this->load->model('m_pemilihan');
		$posts = $this->m_calon->get_data();
		foreach ($posts as $posts_each):
			$jumlah_pemilih=$this->m_pemilihan->get_hasil_pemilihan($posts_each->ID_ketua);
			$this->db->query("UPDATE calon_ketua SET jumlah_pemilih = '$jumlah_pemilih' WHERE ID_ketua = '$posts_each->ID_ketua'");
		endforeach;
		redirect(base_url("mainAdmin"));
	}
	
	function simpan_calon(){
		$this->load->helper('url');
		$this->load->model('m_calon');
		$this->load->model('m_pemilihan');
		$this->load->model('m_login');
		$ID_ketua = $this->input->post('ID_ketua');
		$NIM2 = $this->input->post('NIM2');
		$nama = $this->input->post('nama');
		$nama2 = $this->input->post('nama2');
		$tempat = $this->input->post('tempat');
		$tanggal = $this->input->post('tanggal');
		$deskripsi = $this->input->post('deskripsi');
		$gender = $this->input->post('gender');
		$gender2 = $this->input->post('gender2');
		$daftar_prestasi = $this->input->post('daftar_prestasi');
		$foto = $this->input->post('customFileInput');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
		$periode = $this->m_pemilihan->get_periode();
		$email = $this->input->post('email');
		$email2 = $this->input->post('email2');
		$this->m_calon->tambah_calon($ID_ketua,$NIM2, $nama, $nama2, $tempat, $tanggal, $deskripsi, 
		$gender,$gender2, $daftar_prestasi, $foto , $password,$password2,$periode,$email,$email2);
		$this->m_login->signup_admin($nama, $ID_ketua, $email , $password);
		$this->m_login->signup_admin($nama2, $NIM2, $email2 , $password2);
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
		$tahun =$this->input->post('periode');;
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