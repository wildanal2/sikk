<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbaku_model extends CI_Model {

    public $id_bahan;
    public $nama;
    public $stock;

    public function rules(){
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],
          
            ['field' => 'stock',
            'label' => 'Stock',
            'rules' => 'numeric']
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_bahan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_bahan = uniqid();
        $this->nama = $post["nama"];
        $this->stock = $post["stock"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_bahan = $post["id_bahan"];
        $this->nama = $post["nama"];
        $this->stock = $post["stock"];
        $this->db->update($this->_table, $this, array('id_bahan' => $post['id_bahan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_bahan" => $id));
    }

}

/* End of file Bahanbaku_model.php */
