<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statuskaryawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('StatusKaryawanModel');
    }

	public function index()
	{
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $data['query'] = $this->StatusKaryawanModel->getData();
            $this->load->view('statuskaryawan/statuskaryawan_view', $data);
        } else {
            redirect('/');
        }
    }

    public function add()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

            if ($this->form_validation->run() === false) {
                $this->load->view('statuskaryawan/statuskaryawan_add');
            } else {
                if ($this->StatusKaryawanModel->addData()) {
                    $this->index();
                } else {
                    $this->load->view('statuskaryawan/statuskaryawan_add');
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
                $data['query'] = $this->StatusKaryawanModel->readSpecific($id);
                $this->load->view('statuskaryawan/statuskaryawan_edit', $data);
            } else {
                if ($this->StatusKaryawanModel->editData($id)) {
                    $this->index();
                } else {
                    $data['query'] = $this->StatusKaryawanModel->readSpecific($id);
                    $this->load->view('statuskaryawan/statuskaryawan_Edit', $data);
                }
            }
        } else {
            redirect('/');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->StatusKaryawanModel->deleteData($id);
            $this->index();
        } else {
            redirect('/');
        }
    }
}