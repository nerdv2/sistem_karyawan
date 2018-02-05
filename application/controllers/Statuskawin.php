<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statuskawin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('StatusKawinModel');
    }

	public function index()
	{
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $data['query'] = $this->StatusKawinModel->getData();
            $this->load->view('statuskawin/statuskawin_view', $data);
        } else {
            redirect('/');
        }
    }

    public function add()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

            if ($this->form_validation->run() === false) {
                $this->load->view('statuskawin/statuskawin_add');
            } else {
                if ($this->StatusKawinModel->addData()) {
                    $this->index();
                } else {
                    $this->load->view('statuskawin/statuskawin_add');
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
                $data['query'] = $this->StatusKawinModel->readSpecific($id);
                $this->load->view('statuskawin/statuskawin_edit', $data);
            } else {
                if ($this->StatusKawinModel->editData($id)) {
                    $this->index();
                } else {
                    $data['query'] = $this->StatusKawinModel->readSpecific($id);
                    $this->load->view('statuskawin/statuskawin_edit', $data);
                }
            }
        } else {
            redirect('/');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->StatusKawinModel->deleteData($id);
            $this->index();
        } else {
            redirect('/');
        }
    }
}