<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

    public function getAllBarang()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }
 


}
