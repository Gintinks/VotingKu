<?php 

class Main extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	//coba
	function index(){
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_calon');
		$this->load->model('m_pemilihan');
		$posts = $this->m_mahasiswa->get_data_mahasiswa($this->session->userdata('NIM'));
		$posts2 = $this->m_calon->get_data();
		$posts3 = $this->m_pemilihan->get_data_pemilihan(2020);
	
		
		$data['posts'] = $posts;
		$data['posts2'] = $posts2;
		$data['posts3'] = $posts3;
		
		foreach($posts as $post):
			if ($post->sudah_milih == 0) {
				$this->load->view('home_pemilihan', $data);
			} else {
				$this->load->view('home_hasil',$data);
			}
		endforeach;
		//  if (date_diff($posts3['end_time'], getDate()) > 0 ){
		//  	$this->load->view('');
		//  } else {
		//$this->load->view('home_pemilihan',$data);
		// }
	}
	function pemilihan(){
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_calon');
		$posts = $this->m_mahasiswa->get_data_mahasiswa($this->session->userdata('NIM'));
		$posts2 = $this->m_calon->get_data();
		$data['posts'] = $posts;
		$data['posts2'] = $posts2;
		$this->load->view('pilih_kb',$data);
	}
	function vote(){
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_calon');
		$nim = $this->session->userdata('NIM');
		$ID_ketua = $this->input->post('ID_ketua');
		$this->m_calon->addVote($ID_ketua);
		$this->m_mahasiswa->set_telah_memilih($nim,$ID_ketua);
		redirect(base_url("main"));
	}
}