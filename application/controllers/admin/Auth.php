<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        // for load helper
        $this->load->helper('url_helper');
        $this->load->helper('email');
        $this->load->helper('form');

        $this->load->library('session');

        $this->load->model('Model_user');
    }

    public function index()
    {
        $this->load->view('admin/auth/login');
    }    

    public function auth_login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $result = $this->Model_user->auth_login(['email' => $email, 'password' => $password]);

        if($result) {
            $sess['is_login'] = TRUE;
            $sess['email']    = $result->email;

            $this->session->set_userdata($sess);    
            redirect(base_url("admin/blog"));
        } else {
            $this->session->set_flashdata('error', 'email or password incorrect');
            $this->load->view('admin/auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("admin/auth"));
    }
}