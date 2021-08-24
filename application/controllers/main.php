<?php 

class Main extends CI_Controller{

	function __construct(){
		parent::__construct();
	
	}
	//coba
	function index(){
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_calon');
		$this->load->model('m_pemilihan');
		$posts = $this->m_mahasiswa->get_data_mahasiswa($this->session->userdata('NIM'));
		$posts2 = $this->m_calon->get_data();
		$posts3 = $this->m_pemilihan->get_data_pemilihan(2021);
		
		
		$data['posts'] = $posts;
		$data['posts2'] = $posts2;
		$data['posts3'] = $posts3;
		
		
		$this->load->view('home_pemilihan', $data);
		// foreach($posts as $post):
		// 	if ($post->sudah_milih == 0) {
		// 		$this->load->view('home_pemilihan', $data);
		// 	} else {
		// 		$this->load->view('home_hasil',$data);
		// 	}
		// endforeach;
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
		$this->load->model('m_pemilihan');
		$nim = $this->session->userdata('NIM');
		$ID_ketua = $this->input->post('ID_ketua');
		$this->m_mahasiswa->set_telah_memilih($nim,$ID_ketua);
		$posts = $this->m_calon->get_data();
		foreach ($posts as $posts_each):
			$jumlah_pemilih=$this->m_pemilihan->get_hasil_pemilihan($posts_each->ID_ketua);
			$this->db->query("UPDATE calon_ketua SET jumlah_pemilih = '$jumlah_pemilih' WHERE ID_ketua = '$posts_each->ID_ketua'");
		endforeach;
		redirect(base_url("main"));
	}
}