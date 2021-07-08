<?php

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	function index()
	{
		$this->load->view('v_login2');
	}



	function aksi_login()
	{
		$nim = $this->input->post('nim');
		$Password = $this->input->post('Password');
		$where = array(
			'NIM' => $nim,
			'Password' => $Password,
			'verified' => 1
		);
		$cek = $this->m_login->cek_login("mahasiswa", $where)->num_rows();
		if ($cek > 0) {
			$data_session = array(
				'NIM' => $nim,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("main"));
		} else {
			echo "Username dan password salah !";
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	function signup()
	{
		$this->load->helper('url');
		$this->load->model('m_login');
		$Nama = $this->input->post('nama');
		$Password = $this->input->post('password');
		$email = $this->input->post('email');
		$NIM = $this->input->post('nim');
		if (preg_match("/@student.ub.ac.id/", $email)) {
			$this->m_login->signup($Nama, $NIM, $email, $Password);
			echo "sukses";
			redirect(base_url('login'));
		}
	}
}
