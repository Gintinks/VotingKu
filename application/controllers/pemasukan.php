<?php 

class Pemasukan extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		$this->load->helper('url');
		$this->load->model('m_user');
		$this->load->model('m_user');
    
		$posts = $this->m_user->get_data_user($this->session->userdata('nama'));

		$data['posts'] = $posts;
		$this->load->view('header', $data);
		$this->load->view('sidebar_masuk', $data);
		$this->load->view('home_pemasukan', $data);
		$this->load->view('footer', $data);
	}
}