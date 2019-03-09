<?php

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('product_model');
        $this->load->library('form_validation');

    }
    public function index()
    {
        $this->session->set_flashdata('success', 'success');
        $data['judul'] = "LIST ANGGOTA : ";
        $data['card'] = $this->product_model->get();
        $this->load->view('index', $data);

    }
    public function tambah()
    {

        $data['judul'] = "TAMBAH DATA ";
        $this->load->view('addData', $data);

    }
    public function tambah_aksi()
    {
        $data['card'] = $this->product_model->save();
        redirect(base_url('admin/products', $data));

    }

    public function edit($id)
    {
        $this->session->set_flashdata('update', 'success');
        $data['judul'] = "EDIT DATA ";
        $data['card'] = $this->product_model->getByid($id);
        $update = $this->product_model;
        $update->update($id);
        $this->load->view('editData', $data);

    }

    public function delete($id)
    {
        $this->load->library('session');
        $this->session->set_flashdata('success', 'success');
        $delate = $this->product_model->hapus($id);
        redirect('admin/products');

    }

}
