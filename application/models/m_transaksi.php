<?php

class M_transaksi extends CI_Model
{
    public function tambah_transaksi($username, $pemasukan, $keterangan)
    {
        $this->load->database();
        $data = array(
            'idTransaksi' => null,
            'Date'  => date("Y/m/d"),
            'pemasukan' => $pemasukan,
            'pengeluaran' => null,
            'keterangan' => $keterangan,
            'username' => $username
        );
        $this->db->insert('transaksi', $data);
    }
    public function keluar_transaksi($username, $pengeluaran, $keterangan)
    {
        $this->load->database();
        $data = array(
            'idTransaksi' => null,
            'Date'  => date("Y/m/d"),
            'pemasukan' => null,
            'pengeluaran' => $pengeluaran,
            'keterangan' => $keterangan,
            'username' => $username
        );
        $this->db->insert('transaksi', $data);
    }
    public function get_transaksi_user($username)
    {
        $this->load->database();
        $query = $this->db->get_where('transaksi', array('username' => $username));
        return $query->result();
    }
    public function delete($idTransaksi, $username)
    {
        $this->load->database();
        
        $posts = $this->m_user->get_data_user($username);
        $posts2 = $this->m_transaksi->get_transaksi_byID($idTransaksi);
        foreach ($posts as $post):
            foreach($posts2 as $post2):
                    $saldo = $post->saldo + $post2->pengeluaran - $post2->pemasukan;
            endforeach;
        endforeach;
        
        $this->db->set('saldo', $saldo);
        $this->db->where('username', $username);
        $this->db->update('user'); 
        


        $this->m_transaksi->delete_process($idTransaksi);
    }
    public function delete_process($idTransaksi){
        $this->load->database();
        $this->db->delete('transaksi', array('idTransaksi' => $idTransaksi));
    }

    public function get_transaksi_byID($idTransaksi){
        $this->load->database();
        $this->db->limit(1);
        $this->db->order_by('idTransaksi', 'DESC');
        $this->db->where('idTransaksi', $idTransaksi);
        $query = $this->db->get('transaksi');
        return $query->result();
    }
    public function get_pemasukan_terakhir($username)
    {
        $this->load->database();
        $this->db->limit(1);
        $this->db->order_by('idTransaksi', 'DESC');
        $this->db->where('username', $username);
        $this->db->where('pemasukan !=', 0);
        $query = $this->db->get('transaksi');
        return $query->result();
    }
    public function get_pengeluaran_terakhir($username)
    {
        $this->load->database();
        $this->db->order_by('idTransaksi', 'DESC');
        $this->db->limit(1);
        $this->db->where('username', $username);
        $this->db->where('pengeluaran !=', 0);
        $query = $this->db->get('transaksi');
        return $query->result();
    }
}
