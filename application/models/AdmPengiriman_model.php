<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmPengiriman_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

    public function get_all_transaksi()
    { 
        $query= $this->db->query("SELECT * FROM `transaksi` JOIN user on transaksi.kd_cust= user.kd_cust JOIN status ON transaksi.status=status.id WHERE transaksi.status!=1 and transaksi.status!=2 and transaksi.status!=6 and transaksi.status!=7  order by tgl_pembayaran desc");
        return $query->result();
    }

    public function get_all_riwayat()
    { 
        $query= $this->db->query("SELECT * FROM `transaksi` JOIN user on transaksi.kd_cust= user.kd_cust JOIN status ON transaksi.status=status.id WHERE transaksi.status!=1 and transaksi.status!=2 order by tgl_pembayaran desc");
        return $query->result();
    }
 	
 	public function cekinv_produksi($inv)
    { 
        $query= $this->db->query("SELECT count(*)AS selesai FROM `pembelian` JOIN produksi ON pembelian.id=produksi.kd_pembelian WHERE produksi.status=2 AND pembelian.kd_trans='$inv'");
        return $query->result();
    }

    public function produk_dikirim()
    {
    	$data = array( 
            'status'  => 6
        );
        $this->db->where('kd_trans', $this->input->post('id_inv'));
    	$result=$this->db->update('transaksi',$data);
 		
 		return $result;
    }
       
}
