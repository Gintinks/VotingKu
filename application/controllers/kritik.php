<?php 

class Kritik extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	//coba
	function index(){
		$this->load->helper('url');
		$this->load->model('m_kritik');
		$posts = $this->m_kritik->get_kritik();
		$data['posts'] = $posts;
		$this->load->view('kritik_mahasiswa', $data);
	}

    function simpan_kritik(){
        $this->load->helper('url');
        $this->load->model('m_kritik');
        $isi_kritik = $this->input->post('isi_kritik');
		$this->m_kritik->simpan_kritik($isi_kritik);
		redirect(base_url('main'));
		
    }
}