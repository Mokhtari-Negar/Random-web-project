<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
    public function index()
    {		 
        $this->load->view('register');
    }

    public function viewRouteControll($viewName){

        switch ($viewName) {
            
            case "register":
                $this->load->view('register');
                break;

            case "login":
                $this->load->view('login');
                break;

            case "editprofile":
                echo "Your favorite color is green!";
                break;

            default:
                echo "Your favorite color is neither red, blue, nor green!";
            
        }
    }

    public function register() {

        $this->load->library('form_validation');

        // Form validation rules
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.Email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            // Validation passed, prepare data for database
            $user_data = array(
                'FullName' => $this->input->post('full_name'),
                'Email' => $this->input->post('email'),
                'PasswordHash' =>$this->input->post('password')
            );

            // Insert user into the database
            $this->load->model('UserModel');
            $result=$this->UserModel->insertUser($user_data);
            if ($result) {
                $this->load->view('login');
            } else{
                echo "nashod ke";
            }
        }
    } 


}

