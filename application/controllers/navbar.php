<?php

class Navbar extends CI_Controller
{
    function home()
    {
        redirect(base_url("main"));
    }

    function pilih_kb()
    {
        $this->load->view('pilih_kb');
    }

    function kritik_saran_mahasiswa()
    {
        $this->load->view('kritik_mahasiswa');
    }

    function cek_hasil_pemilihan()
    {
        $this->load->view('view_hasil_pemilihan');
    }

    function kritik_saran_admin()
    {
        $this->load->view('kritik_admin');
    }

}
