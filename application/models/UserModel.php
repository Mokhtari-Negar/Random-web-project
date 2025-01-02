<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Insert user data into the database
    public function insertUser($data) {
        // Insert the data into the 'users' table
        // Make sure 'users' table exists with the appropriate structure
        $result=$this->db->insert('users', $data);  // 'users' is your table name
        return $result;
        // // Check if the insert was successful
        // if ($this->db->affected_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }

        // var_dump($data);
    }

    public function get_user_ID($email) {
        $condition="Email='".$email."'";
		$query=$this->db->get_where('users',$condition);
		
		foreach($query->result() as $row){
			return $row->UserID;
		}
    }
    
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data); // Update the user's information
    }
    
    public function login($email,$password) {
        $query="select * from users where Email='".$email."' and Password='".$password."'";
        $result=$this->db->query($query);
        
        if ($result->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    
}
