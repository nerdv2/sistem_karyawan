<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('DataMaster');
    }

	public function index()
	{
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $data['query'] = $this->AuthModel->getUserData();
            $this->load->view('users/users_view', $data);
        } else {
            redirect('/');
        }
    }

    public function add()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['status'] == 1) {
            // set validation rules
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
            $this->form_validation->set_rules('password', 'Password', 'trim');
            
            if ($this->form_validation->run() === false) {
                $this->load->view('users/users_add');
            } else {
                if ($this->AuthModel->addUser()) {
                    $this->index();
                } else {
                    $this->load->view('users/users_add');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function edit($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['status'] == 1) {
            // set validation rules
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim');
            
            if ($this->form_validation->run() === false) {
                $data['query'] = $this->AdminModel->Read_specific($id)->row();
                $this->load->view('users/users_edit', $data);
            } else {
                if ($this->AuthModel->editUser($id)) {
                    $this->index();
                } else {
                    $this->load->view('users/users_edit');
                }
            }
        } else {
            redirect('/');
        }
    }
    
    public function delete($id)
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['status'] == 1) {
            $this->AuthModel->deleteUser($id);
            $this->index();
        } else {
            redirect('/');
        }
    }
}