<?php

class Komentar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
		$this->load->model('m_pemilihan');
		// if (strtotime($this->m_pemilihan->get_periode()) != "login") {
		// 	redirect(base_url("login"));
		// }
	}

	function index()
	{
		$this->load->helper('url');
		$this->load->model('m_calon');
        $ID_ketua = $this->input->post('ID_ketua');
		$posts = $this->m_calon->get_data_calon($ID_ketua);
		$data['posts'] = $posts;
		
        $this->load->view('komentar_view', $data);
	}
	
}
