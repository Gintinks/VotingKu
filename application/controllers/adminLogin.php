<?php

class adminLogin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}


	public function index()
	{ {
			$this->load->view('adminLogin');
		}
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$Password = $this->input->post('Password');
		$where = array(
			'username' => $username,
			'Password' => $Password
		);
		$cek = $this->m_login->cek_login("admin", $where)->num_rows();
		if ($cek > 0) {

			$data_session = array(
				'username' => $username,
				'status' => "loginAdmin"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("mainAdmin"));
		} else {
			echo "Username dan password salah !";
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
