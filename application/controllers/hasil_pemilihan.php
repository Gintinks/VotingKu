<?php 

class hasil_pemilihan extends CI_Controller{

	function __construct(){
		parent::__construct();
	
    }
	
    function index(){
		$this->load->view('view_hasil_pemilihan');
	}
	
}