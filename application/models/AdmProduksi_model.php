<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmProduksi_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

    public function get_readynow()
    { 
        $query= $this->db->query("SELECT * FROM `transaksi` JOIN pembelian ON transaksi.kd_trans=pembelian.kd_trans JOIN product ON pembelian.kd_barang=product.kd_barang WHERE transaksi.status=3 and pembelian.status=0 ORDER BY transaksi.tgl_pembayaran ASC");
        return $query->result();
    }

    public function get_produksiproduct()
    { 
        $query= $this->db->query("SELECT * FROM `produksi` JOIN product ON produksi.kd_produk=product.kd_barang join status_produksi on produksi.status=status_produksi.id where produksi.status=1");
        return $query->result();
    }

    public function get_riwayatproduksi()
    { 
        $query= $this->db->query("SELECT * FROM `produksi` JOIN product ON produksi.kd_produk=product.kd_barang join status_produksi on produksi.status=status_produksi.id order by produksi.tgl_produksi desc");
        return $query->result();
    }

    public function get_detailproduksi($id)
    { 
        $query= $this->db->query("SELECT * FROM product JOIN product_formula on product.kd_barang=product_formula.kd_produk JOIN bahan_baku ON product_formula.kd_bahan=bahan_baku.id_bahan where product.kd_barang=$id");
        return $query->result();
    }

    public function get_bahanbaku($id)
    {
    	# code...SELECT * FROM `bahan_baku`
    	$query= $this->db->query("SELECT * FROM `bahan_baku` WHERE id_bahan=$id");
        return $query->result();
    }

    public function new_produksi()
    {

    	date_default_timezone_set("Asia/Jakarta");
           
        $data = array(
                'tgl_produksi'  => date("Y-m-d H-i-s"),
                'kd_pembelian'  => $this->input->post('kd_pembelian'), 
                'kd_produk'  => $this->input->post('kd_produk'),
                'jumlah' => $this->input->post('jumlah'),
                'status'  => 1
            );
        $result=$this->db->insert('produksi',$data);

        if ($result) {
        	$data = array( 
                'status'  => 1
            );
            $this->db->where('id', $this->input->post('kd_pembelian'));
        	$result=$this->db->update('pembelian',$data);
        } 

        if ($result) {
        	$data = array( 
                'status'  => 4
            );
            $this->db->where('kd_trans', $this->input->post('kd_trans'));
        	$result=$this->db->update('transaksi',$data);
        } 

        return $result;
    }

    public function jalan_bahanbaku()
    {
    	$data = array( 
            'stok'  => $this->input->post('sisa')
        );
        $this->db->where('id_bahan', $this->input->post('id_bahan'));
    	$result=$this->db->update('bahan_baku',$data);
 		
 		return $result;
    }

    public function new_reqbahan()
    {

        date_default_timezone_set("Asia/Jakarta");
           
        $data = array(
                'tanggal_req'  => date("Y-m-d H-i-s"), 
                'kd_produksi'  => $this->input->post('kd_produksi'),
                'kd_bahan'  => $this->input->post('kd_bahan'),
                'request' => $this->input->post('jumlah'),
                'status'  => 1
            );
        $result=$this->db->insert('pembelian_bahanbaku',$data);
        return $result;
    }

    public function produksi_selesai()
    {
    	$data = array( 
            'status'  => 2
        );
        $this->db->where('id_produk', $this->input->post('id_p'));
    	$result=$this->db->update('produksi',$data);
 		
 		return $result;
    }

       
}
