<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProduksi extends CI_Controller {

	public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('AdmProduksi_model'); 
	 }

	public function index()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			$data['username'] = $session_data['username'];
			if ($session_data['level']==4) {
				$this->load->view('produksi/home',$data);
			}else{
				redirect('Account/login','refresh');
			} 
		}else {
			redirect('Account/login','refresh');
		}   
	}

	public function produksi()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			
			if ($session_data['level']==4) {
				$data['username'] = $session_data['username'];

				$this->load->view('produksi/produksi',$data);
			}else{
				redirect('Account/login','refresh');
			} 
		}else {
			redirect('Account/login','refresh');
		}   
	}

	public function riwayat()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			
			if ($session_data['level']==4) {
				$data['username'] = $session_data['username'];

				$this->load->view('produksi/riwayat',$data);
			}else{
				redirect('Account/login','refresh');
			} 
		}else {
			redirect('Account/login','refresh');
		}   
	}


	// ====== json ======

	public function getTransaksinow()
	{ 
		echo json_encode($this->AdmProduksi_model->get_readynow());
	}

	public function getRiwayat()
	{ 
		echo json_encode($this->AdmProduksi_model->get_riwayatproduksi());
	}

	public function getProcessProduksi()
	{ 
		echo json_encode($this->AdmProduksi_model->get_produksiproduct());
	}

	public function getDetailProduksi()
	{ 
		echo json_encode($this->AdmProduksi_model->get_detailproduksi($this->input->post('id')));
	}

	public function getBahanBaku()
	{
		echo json_encode($this->AdmProduksi_model->get_bahanbaku($this->input->post('id')));
	}

	public function reqBahanBaku()
	{ 
		echo json_encode($this->AdmProduksi_model->new_reqbahan());
	}

	public function newProduksi()
	{ 
		echo json_encode($this->AdmProduksi_model->new_produksi());
	} 

	public function gunakanbahanbaku()
	{ 
		echo json_encode($this->AdmProduksi_model->jalan_bahanbaku());
	}

	public function produksiSelesai()
	{
		echo json_encode($this->AdmProduksi_model->produksi_selesai());
	}
 

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */