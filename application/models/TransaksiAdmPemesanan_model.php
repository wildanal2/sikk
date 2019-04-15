<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiAdmPemesanan_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

    public function get_now_transaksi()
    { 
        $query= $this->db->query("SELECT * FROM `transaksi` where tgl_trans=curdate() ORDER BY tgl_pembayaran");
        return $query->result();
    }

    public function set_valid_transaksi($id)
    { 
    	$data = array(
            'status'      => 3 
        );

        $this->db->where('kd_trans', $id);
        return $this->db->update('transaksi', $data);
    }

    public function set_invalid_transaksi($id)
    { 
        $data = array(
            'status'      => 2
        );

        $this->db->where('kd_trans', $id);
        return $this->db->update('transaksi', $data);
    }
 
       
}
