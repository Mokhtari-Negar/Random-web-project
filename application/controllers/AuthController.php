<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
    public function index()
    {		 
        $this->load->view('homePage');
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

    public function login_user(){

        $this->load->model('UserModel');

        $email=$this->input->post('email');
        $password=$this->input->post('password');

        $result=$this->UserModel->chekUserExist($email,$password);

        if ($result==False){
            $this->session->set_flashdata('error','Wrong pass or email!');
            $this->load->view('login');
        } else {
            $this->load->model('UserModel');
            $userID= $this->UserModel->get_User_ID($email);

            if($userID){
			    $this->load->library('session');
		        $this->session->set_userdata('userID', $userID);
                // $this->load->view('register');
                $data['info'] = $this->UserModel->showUserData($userID);

				if ($userID==1 || $userID==2 ){
					$this->load->view('adminHomePage.php',$data);
				} else {
                    $this->session->set_userdata('userID', $userID);				
				
				    $this->load->view('userHomePage.php',$data);
			    }
            }
        }

    }

    public function insertComment($productID) {

        $this->load->library('session');
        $userID = $this->session->userdata('userID');		
        $this->load->model('UserModel');
        
        $this->load->library('form_validation');	
        
        $this->form_validation->set_rules('name', ' نام ', 'required');		
        $this->form_validation->set_rules('comment', ' متن دیدگاه ', 'required');
        $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
        
        if ($this->form_validation->run() == FALSE) {

            $data1 = $this->UserModel->showUserInformation($userID);
            $data2 = $this->UserModel->showAPoem($productID);
            $data3 = $this->UserModel->poetPic($productID);
            $data4 = $this->UserModel->showComments($productID);
    
            $data['data1'] = json_encode($data1);
            $data['data2'] = json_encode($data2);
            $data['data3'] = json_encode($data3);
            $data['data4'] = json_encode($data4);
            
        //     if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
        //         $this->load->view('admin_inside_poem', $data);
                
        //     } else {
                $this->load->view('productPage',$data);	 
        //     }
            
        } else {

            $data = array(
                'UserName' => $this->input->post('userName'),
                'UserID' => $userID,
                'ProductID' => $productID,
                'Comment' =>$this->input->post('comment')
            );

            $result=$this->UserModel->insertComment($data);
            
            $data1 = $this->UserModel->showUserInformation($userID);
            $data2 = $this->UserModel->showAPoem($productID);
            $data3 = $this->UserModel->poetPic($productID);
            $data4 = $this->UserModel->showComments($productID);
    
            $data['data1'] = json_encode($data1);
            $data['data2'] = json_encode($data2);
            $data['data3'] = json_encode($data3);
            $data['data4'] = json_encode($data4);
            
                
            if($result){
                // if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
                // $this->load->view('admin_inside_poem', $data);
                
                // }else{
                $this->load->view('productPage',$data);		 
                // }
                
            } else {

                $this->session->set_flashdata('error','Something went wrong!');		 
            }
                
        }		   

    }

    
         



}


