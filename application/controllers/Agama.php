<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AgamaModel');
    }

	public function index()
	{
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $data['query'] = $this->AgamaModel->getData();
            $this->load->view('agama/agama_view', $data);
        } else {
            redirect('/');
        }
    }

    public function add()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

            if ($this->form_validation->run() === false) {
                $this->load->view('agama/agama_add');
            } else {
                if ($this->AgamaModel->addData()) {
                    $this->index();
                } else {
                    $this->load->view('agama/agama_add');
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
                $data['query'] = $this->AgamaModel->readSpecific($id);
                $this->load->view('agama/agama_edit', $data);
            } else {
                if ($this->AgamaModel->editData($id)) {
                    $this->index();
                } else {
                    $data['query'] = $this->AgamaModel->readSpecific($id);
                    $this->load->view('agama/agama_edit', $data);
                }
            }
        } else {
            redirect('/');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->AgamaModel->deleteData($id);
            $this->index();
        } else {
            redirect('/');
        }
    }
}