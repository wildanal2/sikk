<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBahanBaku extends CI_Controller {

	public function __construct()
	 {
	 	parent::__construct();
	 	$this->load->model("AdmBahanBaku_model"); //load bahan baku model
        $this->load->library('form_validation');
	 }

	public function index()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			$data['username'] = $session_data['username'];
			if ($session_data['level']==2) {

				$data["pemesanan"] = $this->AdmBahanBaku_model->getAllrequest();
				$this->load->view("bahanbaku/pemesanan/list", $data);
			}else{
				redirect('Account/login','refresh');
			}
		}else {
			redirect('Account/login','refresh');
		}   
	}

	public function daftar()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			$data['username'] = $session_data['username'];
			if ($session_data['level']==2) {

				$data["bahanBakuu"] = $this->AdmBahanBaku_model->getAll();
				$this->load->view("bahanbaku/bahanBaku/list", $data);
			}else{
				redirect('Account/login','refresh');
			}
		}else {
			redirect('Account/login','refresh');
		}   
	}

	public function request()
	{
		if ($this->session->userdata('sik_logged')) {
			$session_data = $this->session->userdata('sik_logged');
			$data['username'] = $session_data['username'];
			if ($session_data['level']==2) {

				$data["pemesanan"] = $this->AdmBahanBaku_model->getAllrequest();
				$this->load->view("bahanbaku/pemesanan/list", $data);
			}else{
				redirect('Account/login','refresh');
			}
		}else {
			redirect('Account/login','refresh');
		}   
	}
 

	// ====== json ======
 

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */