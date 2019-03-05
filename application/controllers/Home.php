<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 
 	public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('Barang_model'); 
	 }

	public function index()
	{
		$data['barang'] = $this->Barang_model->get_all_barang();

		$this->load->view('home',$data);
	}

	public function cart()
	{
		$data['barang'] = $this->Barang_model->get_all_barang();

		$this->load->view('home/cart',$data);
	}

	public function transaksi()
	{ 
		$this->load->view('transaksi');
	}


	// Cartt
	function add_to_cart(){ //fungsi Add To Cart
        $data = array(
            'id' => $this->input->post('produk_id'), 
            'name' => $this->input->post('produk_nama'), 
            'price' => $this->input->post('produk_harga'), 
            'qty' => $this->input->post('quantity'), 
        );
        $this->cart->insert($data);
    }
  	
  	function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data); 
    }

}
