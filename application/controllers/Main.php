<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

	public function index()
	{
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            $this->load->view('dashboard/dashboard_view');
        } else {
            $this->login();
        }
	}

	public function login()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            redirect('/');
        } else {
            //set validation rules
            $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run() === false) {
                //validation not ok, send validation error to view
                $this->load->view('login/login_view');
            } else {
                //set variables from the form
                $username = $this->input->post('username');
                $password = $this->input->post('password');
    
                if ($this->AuthModel->resolve_user_login($username, $password)) {
                    $user_id    = $this->AuthModel->get_user_id_from_username($username);
                    $user        = $this->AuthModel->get_user($user_id);
    
                    //set session user data
                    $_SESSION['user_id']    = (int)$user->id_user;
                    $_SESSION['username']   = (string)$user->username;
                    $_SESSION['logged_in']  = (bool)true;
                    
                    $auth_status = $user->status;
    
                    $_SESSION['status'] = $auth_status;

                    $log = @$this->AuthModel->record_login(0, $username);
    
                    $this->index();
                } else {
                    $log = @$this->AuthModel->record_login(1, $username);

                    $data['error'] = "Invalid username or password!";
                    $this->load->view('login/login_view', $data);
                }
            }
        }
	}

	public function logout()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            
            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            
            // user logout ok
            redirect('/');
        } else {
            
            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('/');
        }
	}
}
