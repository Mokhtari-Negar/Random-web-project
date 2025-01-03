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
        
        if ($this->form_validation->run() == TRUE) {

            $insertData = array(
                'UserName' => $this->input->post('userName'),
                'UserID' => $userID,
                'ProductID' => $productID,
                'Comment' =>$this->input->post('comment')
            );

            $result=$this->UserModel->insertComment($insertData);

            if(!$result){
                // if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
                // $this->load->view('admin_inside_poem', $data);
                
                // }else{}

                $this->session->set_flashdata('error','Something went wrong!');
            }    
               
        }

        $data1 = $this->UserModel->showUserData($userID);
        $data2 = $this->UserModel->showAPoem($productID);
        $data3 = $this->UserModel->poetPic($productID);
        $data4 = $this->UserModel->showComments($productID);

        $data['data1'] = json_encode($data1);
        $data['data2'] = json_encode($data2);
        $data['data3'] = json_encode($data3);
        $data['data4'] = json_encode($data4);

        $this->load->view('productPage',$data);	 		   

    }

    // show comments of a user
    public function showUserComments() {
        
        $this->load->library('session');
        $userID = $this->session->userdata('userID');
		
		$this->load->model('UserModel');

        $data1 = $this->UserModel->showUserData($userID);
        $data2 = $this->UserModel->showUserComments($userID);

        $data['data1'] = json_encode($data1);
        $data['data2'] = json_encode($data2);

        $this->load->view('commentPage',$data);

    }
    
	// Edit User Information Task
	public function showUserData() {	
		
	    $this->load->library('session');
        $userID = $this->session->userdata('userID');
		
		$this->load->model('UserModel');

        $data['info'] = $this->UserModel->showUserData($userID);
        $this->load->view('editUserData', $data);
	}

	public function updateData() {

        $this->load->library('session');
        $userID = $this->session->userdata('userID');

        $this->load->model('UserModel');

		$this->load->library('form_validation');

        $this->form_validation->set_rules('fname', 'نام', 'required|min_length[2]|regex_match[/^[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+(\s[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+)*$/]');
		$this->form_validation->set_rules('lname', 'نام خانوادگی', 'required|min_length[3]|regex_match[/^[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+(\s[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+)*$/]');
		$this->form_validation->set_rules('email', 'ایمیل', 'valid_email|callback_check_unique_email');
	    $this->form_validation->set_rules('pass', 'رمز عبور', 'required|min_length[8]|callback_password_check');
		$this->form_validation->set_rules('user', 'نام کاربری', 'required|callback_check_unique_username');
	
		$this->form_validation->set_message('regex_match', '%s باید فقط شامل حروف الفبا باشد.');
		$this->form_validation->set_message('min_length', 'حداقل طول %s %s کاراکتر است.');
		$this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
		$this->form_validation->set_message('valid_email', '%s باید طبق فرمت درستی وارد شود.');
		$this->form_validation->set_message('check_unique_email', 'ایمیل وارد شده تکراری است.');
		$this->form_validation->set_message('check_unique_username', 'نام کاربری وارد شده تکراری است.');
	
	    if ($this->form_validation->run() == FALSE) {

            $data['info'] = $this->UserModel->showUserData($userID);
            $this->load->view('editUserData', $data);
        } else {

            $result=$this->UserModel->updateData($userID);
            $data['info'] = $this->UserModel->showUserData($userID);

            if($result) {
                
                $this->load->view('user_success_alert',$data);
            } else {
                
                $this->load->view('user_error_alert',$data);
    		}

        }

	 
    }

    public function showProduct ($productID) {

        $this->load->library('session');
        $userID= $this->session->userdata('userID');
         
        $this->load->model('UserModel');		  
            
        $data1 = $this->UserModel->showUserData($userID);
        $data2 = $this->UserModel->showProduct($productID);
        $data3 = $this->UserModel->showComments($productID);

        $data['data1'] = json_encode($data1);
        $data['data2'] = json_encode($data2);
        $data['data3'] = json_encode($data3);
            
        $this->load->view('productPage',$data);		 
    }

    public function productList () {
        
        $this->load->library('session');
        $userID= $this->session->userdata('userID');
         
        $this->load->model('UserModel');		  
            
        $data1 = $this->UserModel->showUserData($userID);
        $data2 = $this->UserModel->productList($productID);

        $data['data1'] = json_encode($data1);
        $data['data2'] = json_encode($data2);
            
        $this->load->view('productListPage',$data);
    }

    public function productCategorizedList ($categoryID) {
        
        $this->load->library('session');
        $userID= $this->session->userdata('userID');
         
        $this->load->model('UserModel');		  
            
        $data1 = $this->UserModel->showUserData($userID);
        $data2 = $this->UserModel->productCategorizedList($categoryID);

        $data['data1'] = json_encode($data1);
        $data['data2'] = json_encode($data2);
            
        $this->load->view('productListPage',$data);
    }

    //Insert Poem Methods:
	public function insertProduct() {

        $this->load->library('session');
        $adminID = $this->session->userdata('userID');
        $this->load->model('UserModel');

        $data['info'] = $this->UserModel->showUserInformation($adminID);
    
        //form validation
        
        $this->load->library('form_validation');	
            
        $this->form_validation->set_rules('name', 'عنوان شعر', 'required');		
        $this->form_validation->set_rules('poem', ' متن شعر ', 'required');
        $this->form_validation->set_rules('book', ' اثر شاعر ', 'required');
        $this->form_validation->set_rules('form', ' قالب شعر ', 'required');
        $this->form_validation->set_rules('pname', ' شاعر ', 'required');
        $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
        
        if ($this->form_validation->run() == FALSE){
            if($adminID==1 || $adminID==2){
                $this->load->view('insert_admin1',$data);
            }
            else if($adminID==3){
                $this->load->view('insert_admin3',$data);
            }
            else if($adminID==4){
                $this->load->view('insert_admin4',$data);
            }
            else if($adminID==5){
                $this->load->view('insert_admin5',$data);
            }
            else if($adminID==6){
                $this->load->view('insert_admin6',$data);
            }
            else if($adminID==7){
                $this->load->view('insert_main_admin',$data);
            }
            

        }else{
            $result=$this->UserModel->insertPoem($_POST,$adminID);
            
            if($result==true){
                
                $this->load->view('admin_success_alert',$data);
            }
            else{
                $this->load->view('admin_error_alert',$data);
            }
        }		 
            
    }	

    public function editProduct() {
		 
		$this->load->library('session');
		$adminID = $this->session->userdata('userID');
		$this->load->model('UserModel');
		 
		 //form validation:
		 $this->load->library('form_validation');	
		
	   $this->form_validation->set_rules('name', 'عنوان شعر', 'required');		
	   $this->form_validation->set_rules('poem', ' متن شعر ', 'required');
	   $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
		 
	   if ($this->form_validation->run() == FALSE){
		   $data1 = $this->UserModel->showUserInformation($adminID);
           $data2 = $this->UserModel->fetchPoemValue($_POST['id']);

           $data['data1'] = json_encode($data1);
           $data['data2'] = json_encode($data2);
		   
		 if($adminID==1 || $adminID==2){
			$this->load->view('EditPoem_admin1', $data);
		 }
		 else if ($adminID==3){
			$this->load->view('EditPoem_admin3', $data);
		 }
		 else if ($adminID==4){
			$this->load->view('EditPoem_admin4', $data);
		 }
		 else if ($adminID==5){
			$this->load->view('EditPoem_admin5', $data);
		 }
		 else if ($adminID==6){
			$this->load->view('EditPoem_admin6', $data);
		 }
		 else if ($adminID==7){
			$this->load->view('EditPoem_main_admin', $data);
		 }

	   }else{
          $data['info'] = $this->UserModel->showUserInformation($adminID);
      
		 $result=$this->UserModel->updatePoem($adminID,$_POST['id']);
		 
		 
		 if($result==true){
			
			$this->load->view('admin_success_alert',$data);
		 }
		 else{
			$this->load->view('admin_error_alert',$data);
		 }		   
	   }
		 
	}
    
    public function deleteProduct () {


    }
    
    public function logOut() {

        $this->load->library('session');

        // Destroy the session
        $this->session->sess_destroy();

        // Redirect back to the previous page using HTTP_REFERER
        $referer = $this->input->server('HTTP_REFERER'); // Get the referring URL
        if ($referer) {
            redirect($referer); // Redirect to the previous page
        } else {
            // If no referer found, redirect to a default page (like the homepage or login page)
            redirect('login');
        }

    }


}


// EOF
