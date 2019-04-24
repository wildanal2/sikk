<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmBahanBaku_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }


    public function getAll()
    { 
        $query = $this->db->get('bahan_baku');
        return $query->result();
    } 

    public function getAllrequest()
    {  
        $query= $this->db->query("SELECT * FROM pembelian_bahanbaku join bahan_baku on pembelian_bahanbaku.kd_bahan=bahan_baku.id_bahan WHERE pembelian_bahanbaku.status=1");
        return $query->result();
    } 
       
}
