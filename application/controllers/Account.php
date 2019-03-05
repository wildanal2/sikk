<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
 
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function ceklogin()
	{ 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$output = array('error' => false);

		$result = $this->Login_model->login($username,$password);
		if ($result) { 
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id_user' => $row->id,
					'username' => $row->user,
					'level' => $row->level
				);	 
				$output['level'] = $row->level;
			} 
			// set sesion logined
			$this->session->set_userdata('sik_logged',$sess_array);  
			$output['message'] = 'Prosess Masuk. Tunggu sebentar...';
		}else { 
			$output['error'] = true;
			$output['message'] = 'Gagal masuk. User atau Password tidak terdaftar';
 
			// memasukkan data session
			$this->session->set_userdata('sik_loginattempt',$sessattempt_array );

		}

		echo json_encode($output); 
	}
 


}
