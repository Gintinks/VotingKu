<?php 

class Update extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		$this->load->helper('url');
        $this->load->model('m_user');
        $this->load->model('m_transaksi');
    
        $pemasukan_terakhir = $this->input->post('Pemasukan');
        $keterangan = $this->input->post('Keterangan');
        $this->m_user->update_data_user($this->session->userdata('nama'), $pemasukan_terakhir);
        $this->m_transaksi->tambah_transaksi($this->session->userdata('nama'), $pemasukan_terakhir, $keterangan);
        redirect(base_url("admin"));
    }

    public function keluar(){
        $this->load->helper('url');
        $this->load->model('m_user');
        $this->load->model('m_transaksi');
        $pengeluaran_terakhir = $this->input->post('Pengeluaran');
        $keterangan = $this->input->post('Keterangan');
        $this->m_user->update_data_user($this->session->userdata('nama'), "-$pengeluaran_terakhir");
        $this->m_transaksi->keluar_transaksi($this->session->userdata('nama'), $pengeluaran_terakhir, $keterangan);
        redirect(base_url("admin"));
    }
   
    
}