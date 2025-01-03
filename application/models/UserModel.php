<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        
        parent::__construct();
        $this->load->database();
    }

    // Insert user data into the database
    public function insertUser($data) {

        $result=$this->db->insert('users', $data);  // 'users' is table name
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

    public function showUserData($userID) {
		$sql="select * from users where UserID=".$userID;		
		$query = $this->db->query($sql);
        return $query->result_array();
	}

    public function updateData($userID) {

        $sql="update users set FullName='".$_POST['fullName']."' , Email='".$_POST['email']."', Password='".$_POST['password']."' , PhoneNumber='".$_POST['phoneNum']."' , Address='".$_POST['address']."' where UserID=".$userID;
		$query = $this->db->query($sql);

		if($query) {

			return true;
		} else {

			return false;
		}
    }

    // insert comment
	public function insertComment($data) {
		$result=$this->db->insert('comments', $data);
        return $result;
	}
	
	//show comments of a product:
    public function showComments($productID) {

        $query = "SELECT * from comments WHERE ProductID = ".$productID;
        $sql = $this->db->query($query);
        return $sql->result_array();
    }
    
    // show comments of a user
    public function showUserComments($userID) {

        $query = "SELECT * from comments WHERE UserID = ".$userID;
        $sql = $this->db->query($query);
        return $sql->result_array();
    }

    public function showProduct ($productID) {

        $sql="select * from products where ProductID=".$productID;
		$query = $this->db->query($sql);
		 return $query->result_array();
    }

    public function productList () {

        $sql="select * from products";
		$query = $this->db->query($sql);
		 return $query->result_array();
    }

    public function productCategorizedList ($categoryID) {

        $sql="select * from products where CategoryID=".$categoryID;
		$query = $this->db->query($sql);
		 return $query->result_array();
    }

    //delete poem main admin:
	public function deletePoem($poemid) {
        $sql="delete from poem where id=".$poemid;

		 $query= $this->db->query($sql);
		 if($query){
			return true;
		}
		else{
			return false;
		}
		
	}



}
