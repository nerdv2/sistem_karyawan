<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikanterakhir extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PendidikanTerakhirModel');
    }

	public function index()
	{
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $data['query'] = $this->PendidikanTerakhirModel->getData();
            $this->load->view('pendidikanterakhir/pendidikanterakhir_view', $data);
        } else {
            redirect('/');
        }
    }

    public function add()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

            if ($this->form_validation->run() === false) {
                $this->load->view('pendidikanterakhir/pendidikanterakhir_add');
            } else {
                if ($this->PendidikanTerakhirModel->addData()) {
                    $this->index();
                } else {
                    $this->load->view('pendidikanterakhir/pendidikanterakhir_add');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function edit($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

            if ($this->form_validation->run() === false) {
                $data['query'] = $this->PendidikanTerakhirModel->readSpecific($id);
                $this->load->view('pendidikanterakhir/pendidikanterakhir_edit', $data);
            } else {
                if ($this->PendidikanTerakhirModel->editData($id)) {
                    $this->index();
                } else {
                    $data['query'] = $this->PendidikanTerakhirModel->readSpecific($id);
                    $this->load->view('pendidikanterakhir/pendidikanterakhir_edit', $data);
                }
            }
        } else {
            redirect('/');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->PendidikanTerakhirModel->deleteData($id);
            $this->index();
        } else {
            redirect('/');
        }
    }
}