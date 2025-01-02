<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        
        parent::__construct();
        $this->load->database();
    }

    // Insert user data into the database
    public function insertUser($data) {

        $result=$this->db->insert('users', $data);  // 'users' is your table name
        return $result;
    }

    
    public function chekUserExist($email,$password) {
        $query="select * from users where Email='".$email."' and Password='".$password."'";
        $result=$this->db->query($query);
        
        if ($result->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_user_ID($email) {
        $condition="Email='".$email."'";
		$query=$this->db->get_where('users',$condition);
		
		foreach($query->result() as $row){
			return $row->UserID;
		}
    }

    public function showUserData($userID){
		$sql="select * from users where UserID=".$userID;		
		$query = $this->db->query($sql);
        return $query->result_array();
	}


}
