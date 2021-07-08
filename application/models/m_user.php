<?php

class M_user extends CI_Model{
    public function get_data(){
        return $this->db->get('user')-> result_array();
    }

    public function get_data_user($username){
        $this->load->database();
        $query = $this->db->get_where('user', array('username' => $username));
        return $query->result();
    }

    public function update_data_user($username, $perubahan){
        $this->load->database();
      //  $data =  $this->db->get_where('user', array('username' => $username));
        $posts = $this->m_user->get_data_user($username);
        foreach ($posts as $post): 
            $saldo = $post->saldo + $perubahan;
        endforeach;
        if($perubahan > 0){
            $this->db->query("UPDATE user SET saldo = '$saldo', pemasukan_terakhir = '$perubahan' WHERE username = '$username'");
        }else{
            $this->db->query("UPDATE user SET saldo = '$saldo', pengeluaran_terakhir = '$perubahan' WHERE username = '$username'");
        }
    }

   
}

 