<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JabatanModel');
    }

	public function index()
	{
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $data['query'] = $this->JabatanModel->getData();
            $this->load->view('jabatan/jabatan_view', $data);
        } else {
            redirect('/');
        }
    }

    public function add()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

            if ($this->form_validation->run() === false) {
                $this->load->view('jabatan/jabatan_add');
            } else {
                if ($this->JabatanModel->addData()) {
                    $this->index();
                } else {
                    $this->load->view('jabatan/jabatan_add');
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
                $data['query'] = $this->JabatanModel->readSpecific($id);
                $this->load->view('jabatan/jabatan_edit', $data);
            } else {
                if ($this->JabatanModel->editData($id)) {
                    $this->index();
                } else {
                    $data['query'] = $this->JabatanModel->readSpecific($id);
                    $this->load->view('jabatan/jabatan_edit', $data);
                }
            }
        } else {
            redirect('/');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->JabatanModel->deleteData($id);
            $this->index();
        } else {
            redirect('/');
        }
    }
}