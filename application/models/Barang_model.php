<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }


    public function get_all_barang()
    { 
        $query = $this->db->get('barang');
        return $query->result();
    }
 

}
