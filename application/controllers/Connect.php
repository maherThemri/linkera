<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Connect extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model("Auth_model");
    }
    public function index()
    {
        $this->load->view('Authentification/index');
    }
    public function signin()
    {
        try{
        $this->form_validation->set_rules('user_email', 'user_Email', 'required|valid_email');
        $this->form_validation->set_rules('user_password', 'user_Password', 'required');

        if ($this->form_validation->run() == FALSE) {
           echo json_encode(array("process"=>0));
        } else {
            $user_email = $this->input->post('user_email');
            $user_password = sha1($this->input->post('user_password'));
            $user = $this->Auth_model->signin($user_email, $user_password);           
            if ($user) {
                $session_array = array(
                    'user_id' => $user['user_id'],
                    'user_email' => $user['user_email'],
                    'user_firstname' => $user['user_firstname'],
                    'user_lastname' => $user['user_lastname'],
                    'user_phonenumber' => $user['user_phonenumber'],
                    'logged_in' => true,
                );               
                $this->session->set_userdata($session_array);
                echo json_encode(array("process"=>1));
            } else {
                echo json_encode(array("process"=>0));
            }
        }}catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('logged_in');
        redirect('connect');
    }
}
