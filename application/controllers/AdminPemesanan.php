<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPemesanan extends CI_Controller {

	public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('TransaksiAdmPemesanan_model'); 
	 }

	public function index()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			$data['username'] = $session_data['username'];
			
			$this->load->view('Pemesanan/home',$data);
		}else {
			redirect('Account/login','refresh');
		}   
	}

	public function daftar()
	{
		$session_data = $this->session->userdata('sik_logged');
		$data['username'] = $session_data['username'];

		$this->load->view('Pemesanan/daftarpemesanan',$data);
	}


	// ====== json ======

	public function getTransaksinow()
	{ 
		echo json_encode($this->TransaksiAdmPemesanan_model->get_now_transaksi());
	}

	public function setValid()
	{ 
		echo json_encode($this->TransaksiAdmPemesanan_model->set_valid_transaksi($this->input->post('inv')));
	}

	public function setInvalid()
	{ 
		echo json_encode($this->TransaksiAdmPemesanan_model->set_invalid_transaksi($this->input->post('inv')));
	}	

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */