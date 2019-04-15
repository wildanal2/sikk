<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPengiriman extends CI_Controller {

	public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model('AdmPengiriman_model'); 
	 }

	public function index()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			$data['username'] = $session_data['username'];
			if ($session_data['level']==3) {
				$this->load->view('pengiriman/home',$data);
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
			$data['username'] = $session_data['username'];
			if ($session_data['level']==3) {
				$this->load->view('pengiriman/riwayat',$data);
			}else{
				redirect('Account/login','refresh');
			}
		}else {
			redirect('Account/login','refresh');
		}   
	}
 


	// ====== json ======
 	public function getTransaksi()
	{ 
		echo json_encode($this->AdmPengiriman_model->get_all_transaksi());
	}

	public function getRiwayat()
	{ 
		echo json_encode($this->AdmPengiriman_model->get_all_riwayat());
	}

	public function getInvProduksi()
	{ 
		echo json_encode($this->AdmPengiriman_model->cekinv_produksi($this->input->post('inv')));
	}

	public function kirimBarang()
	{ 
		echo json_encode($this->AdmPengiriman_model->produk_dikirim());
	}
 

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */