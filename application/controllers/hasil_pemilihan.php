<?php

class hasil_pemilihan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_calon');
		
		$posts2 = $this->m_calon->get_data();
		$data['posts2'] = $posts2;

		$this->load->view('view_hasil_pemilihan',$data);
	}
}
