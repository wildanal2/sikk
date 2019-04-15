<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiCustomer_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }


    public function get_all_barang()
    { 
        $query = $this->db->get('product');
        return $query->result();
    }
 
 	public function get_all_customer()
    { 
        $query = $this->db->get('user');
        return $query->result();
    }

    public function get_all_transaksi($id)
    { 
        $query= $this->db->query("SELECT * FROM `transaksi` JOIN user on transaksi.kd_cust= user.kd_cust JOIN status ON transaksi.status=status.id WHERE user.kd_cust=$id order by tgl_pembayaran desc");
        return $query->result();
    }

    public function getTransaksidetail($id)
    { 
    	$query= $this->db->query("SELECT * FROM `pembelian` JOIN product ON pembelian.kd_barang= product.kd_barang where kd_trans='$id'");
        return $query->result();
    }

    public function getjumlahinv($id)
    { 
        $query= $this->db->query("select COUNT(*)AS jml  FROM `pembelian` WHERE kd_trans='$id'");
        return $query->result();
    }

    public function newtransaksi($bukti)
    {
        // conf
        date_default_timezone_set("Asia/Jakarta");
        $session_data = $this->session->userdata('sik_logged'); 

        $kd_tran = $this->input->post('idtransaksi');
        $tgltran = date("Y-m-d H-i-s");
        $pembayaran = date("Y-m-d H-i-s");
        $kd_cust = $session_data['id_user'];
        $total = $this->input->post('total');
        $nama = $this->input->post('customer');
        $alamat = $this->input->post('alamat');

        $data = array(
            'kd_trans'      => $kd_tran,
            'tgl_trans'      => $tgltran,
            'tgl_pembayaran'      => $pembayaran, 
            'kd_cust'      => $kd_cust,
            'nama'      => $nama,
            'alamat'      => $alamat,
            'total'      => $total,
            'bukti'      => $bukti,
            'status'      => 1
        ); 
        return $this->db->insert('transaksi', $data);
    }

    public function newtransbar($kd_tran,$kd_barang,$qty,$harga)
    {
        $data = array(
            'kd_trans'      => $kd_tran,
            'kd_barang'      => $kd_barang,  
            'jumlah'      => $qty,
            'harga'      => $harga
        );

        return $this->db->insert('pembelian', $data);
    }

    public function produk_sampai()
    {
        $data = array( 
            'status'  => 7
        );
        $this->db->where('kd_trans', $this->input->post('id_inv'));
        $result=$this->db->update('transaksi',$data);
        
        return $result;
    }
       
}
