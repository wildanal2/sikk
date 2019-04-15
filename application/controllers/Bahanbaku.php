<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbaku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("bahanbaku_model"); //load bahan baku model
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["bahanBaku"] = $this->bahanbaku_model->getAll();
        $this->load->view("admin/bahanBaku/list", $data);
    }

    public function add()
    {
        $bahanbaku = $this->bahanbaku_model; //object model
        $validation = $this->form_validation;
        $validation->set_rules($bahanbaku->rules());

        if ($validation->run()) {
            $bahanbaku->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/bahanBaku/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/bahanBaku');
       
        $bahanbaku = $this->bahanbaku_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $bahanbaku->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["bahanBaku"] = $bahanbaku->getById($id);
        if (!$data["bahanBaku"]) show_404();
        
        $this->load->view("admin/bahanBaku/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->bahanbaku_model->delete($id)) {
            redirect(site_url('admin/bahanBaku'));
        }
    }
}
