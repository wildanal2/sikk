<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeCustomer extends CI_Controller {
 
 	public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('TransaksiCustomer_model'); 
	 }

	public function index()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			
			if ($session_data['level']==6) {
				$data['barang'] = $this->TransaksiCustomer_model->get_all_barang();
				$this->load->view('customer/home',$data);
			}else if ($session_data['level']==5) {
				redirect('AdminPemesanan','refresh');
			} else if ($session_data['level']==4) {
				redirect('AdminProduksi','refresh');
			} 
		}else {

			$data['barang'] = $this->TransaksiCustomer_model->get_all_barang();
			$this->load->view('customer/home',$data);
		}   
	}

	public function cart()
	{
		$data['barang'] = $this->TransaksiCustomer_model->get_all_barang();
		$data['customer'] = $this->TransaksiCustomer_model->get_all_customer();

		$this->load->view('customer/cart',$data);
	} 

	public function account()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			$data['username'] = $session_data['username'];
			
			$this->load->view('customer/account',$data); 
		}else {
			redirect('Account/login','refresh');
		}  
	} 

	// Json
	public function bayar()
	{ 
		// conf
		date_default_timezone_set("Asia/Jakarta"); 
		$result= false;
 		$new_name = date("YmdHis");//new name
 		$session_data = $this->session->userdata('sik_logged'); 
		  
		$config['upload_path']="./assets/images/pembayarancustomer"; //path folder file upload
		$config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload
		 
		$file_name = $session_data['id_user'];
		$config['file_name'] = $file_name.$new_name;  //set name

		$this->load->library('upload', $config); //call library upload

		if ($this->upload->do_upload("file")){ //upload file
			$data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload

			// mendapatkan ekstensi file
            $path = $_FILES['file']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
			$source =  "pembayarancustomer/".$file_name.$new_name.".".$ext;  //set file name ke variable image 
 
			// write DB
			// new invoice
			$result = $this->TransaksiCustomer_model->newtransaksi($source);
			// // cart
			$kd_tran = $this->input->post('idtransaksi');
			foreach ($this->cart->contents() as $items) {
	        	$result = $this->TransaksiCustomer_model->newtransbar($kd_tran,$items['id'],$items['qty'],$items['price']);
	        }
		} 

		echo json_encode($result);
		$this->cart->destroy();
	}


	// show transaksi 
	public function getTransaksi()
	{
		$session_data = $this->session->userdata('sik_logged'); 
		echo json_encode($this->TransaksiCustomer_model->get_all_transaksi($session_data['id_user']));
	}

	public function getTransaksidetail()
	{
		echo json_encode($this->TransaksiCustomer_model->getTransaksidetail($this->input->post('id_t')));
	}

	public function getInvoiceJumlah()
	{
		echo json_encode($this->TransaksiCustomer_model->getjumlahinv($this->input->post('inv_id')));
	}

	public function paketSampai()
	{
		echo json_encode($this->TransaksiCustomer_model->produk_sampai());
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
