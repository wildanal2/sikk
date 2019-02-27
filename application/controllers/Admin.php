<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');  		
	}
 
	public function index(){
		$this->load->view('admin/index'); 
	}
 
	public function newtransaksi(){
		$this->load->view('admin/transaksibaru'); 
	}

	public function pemesanan(){
		$this->load->view('admin/pemesanan'); 
	}

	public function barang(){
		$this->load->view('admin/barang'); 
	}

	// =========== Data ========
	public function getbarang()
	{
		echo json_encode( $this->Admin_model->getAllBarang());
	}

}