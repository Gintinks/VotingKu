<?php

class Pemilihan extends CI_Controller
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
		$this->load->model('m_mahasiswa');
		$posts = $this->m_mahasiswa->get_data_mahasiswa($this->session->userdata('NIM'));
		$data['posts'] = $posts;

		
		if ($posts[0]->sudah_milih == 1) {
			$this->session->unset_userdata('warning');
			$this->session->set_userdata('warning', 1);
			redirect(base_url("main"));
		} else {
			$this->load->model('m_calon');
			$posts2 = $this->m_calon->get_data();
			$data['posts2'] = $posts2;

			$this->load->view('pilih_kb', $data);
		}
	}
	function vote()
	{
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_calon');
		$nim = $this->session->userdata('NIM');
		$ID_ketua = $this->input->post('ID_ketua');
		$this->m_calon->addVote($ID_ketua);
		$this->m_mahasiswa->set_telah_memilih($nim, $ID_ketua);
		redirect(base_url("main"));
	}
}
