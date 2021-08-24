<?php

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_pemilihan');
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
			'RIGHT(NIM,15)' => $nim,
			'Password' => $Password,
			'verified' => 1,
			'periode' => $this->m_pemilihan->get_periode()
		);
		$cek = $this->m_login->cek_login("mahasiswa", $where)->num_rows();

		if ($cek > 0) {
			$data_session = array(
				'NIM' => $nim,
				'status' => "login",
				'warning' => 0
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
		redirect(base_url('main'));
	}

	function signup()
	{
		$this->load->helper('url');
		$this->load->model('m_login');
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$verify_code = substr(str_shuffle($set), 0, 12);
		$Nama = $this->input->post('nama');
		$Password = $this->input->post('password');
		$email = $this->input->post('email');
		$NIM = $this->input->post('nim');
		if (preg_match("/@student.ub.ac.id/", $email)) {
			$this->m_login->signup($Nama, $NIM, $email, $Password, $verify_code);
			echo "sukses";

			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'votingku@gmail.com', // change it to yours
				'smtp_pass' => 'Gidklul123', // change it to yours
				'mailtype' => 'html',
				'wordwrap' => TRUE
			);

			$message = 	"
					  <html>
					  <head>
						  <title>Verification Code</title>
					  </head>
					  <body>
						  <h2>Thank you for Registering.</h2>
						  <p>Your Account:</p>
						  <p>Email: " . $email . "</p>
						  <p>Password: " . $Password . "</p>
						  <p>Please click the link below to activate your account.</p>
						  <h4><a href='" . base_url() . "m_mahasiswa/set_data_verified/" . $NIM . "/" . $verify_code . "'>Activate My Account</a></h4>
					  </body>
					  </html>
					  ";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject('Signup Verification Email');
			$this->email->message($message);
			$this->email->send();

			redirect(base_url('login'));
		}
	}
	public function data_verified()
	{
		$this->load->helper('url');
		$this->load->model('m_mahasiswa');
		$nim =  $this->uri->segment(3);
		$verify_code = $this->uri->segment(4);
		$this->m_mahasiswa->set_data_verified($nim, $verify_code);
		redirect(base_url('login'));
	}


	function signup_calon_ketua()
	{
		$this->load->helper('url');
		$this->load->model('m_login');
		$Nama = $this->input->post('nama');
		$Password = $this->input->post('password');
		$email = $this->input->post('email');
		$NIM = "X" + $this->input->post('nim');
		if (preg_match("/@student.ub.ac.id/", $email)) {
			$this->m_login->signup($Nama, $NIM, $email, $Password);
			echo "sukses";
			redirect(base_url('login'));
		}
	}
}
