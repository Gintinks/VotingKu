<?php 

class Daftar extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		$this->load->helper('url');
        $this->load->model('m_user');
        
		$posts = $this->m_user->get_data_user($this->session->userdata('nama'));
        $posts2 = $this->m_transaksi->get_transaksi_user($this->session->userdata('nama'));
        $data['posts'] = $posts;
        $data['posts2'] = $posts2;
		$this->load->view('header', $data);
		$this->load->view('sidebar_daftar', $data);
		$this->load->view('v_daftar', $data);
		$this->load->view('footer', $data);
    }
    function delete($idTransaksi){
        $this->load->model('m_transaksi');
		$this->load->model('m_user');
		
        $this->m_transaksi->delete($idTransaksi, $this->session->userdata('nama'));
        redirect(base_url('daftar'));
    }
}