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

    
    public function chekUserExist($email) {
        $query="select * from users where Email='".$email."'";

        $condition = "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/";

        $result=$this->db->query($query);
        
        if(preg_match($condition,$email)){
		    if($result->num_rows()>0) {

		        return true;
	        } else {

		        return false;
	        }
	    } else {
		    
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

    public function insertProduct ($productData) {

        $result=$this->db->insert('products', $productData); 
        return $result;
    }

    public function updateProduct($productID) {

        $sql="update products set Name='".$_POST['name']."' , Description='".$_POST['description']."', Price='".$_POST['price']."' , Stock='".$_POST['stock']."' , CategoryID='".$_POST['catID']."' , ImageURL='".$_POST['imageName']."' where ProductID=".$productID;
        $query = $this->db->query($sql);

        if($query) {

            return true;
        } else {

            return false;
        }
        
    }

	public function deleteProduct($productID) {

        $sql="delete from products where ProductID=".$productID;
        $query= $this->db->query($sql);
        
        if ($query) {

			return true;
		} else {

			return false;
		}
		
	}

    public function insertOrder($data) {
        
        $result = $this->db->insert('orders', $data);
        if ($result) {

            $output = $this->db->insert_id();
            return $output; 
        } else {

            return false;
        }

    }

    public function insertOrderDetail($data) {
        
        $result = $this->db->insert('orderdetails', $data);
        return $result;
    }

    public function deleteOdrer ($orderID) {
        
        $sql="delete from orders where OrderID=".$orderID;
        $query= $this->db->query($sql);
        
        if ($query) {

			return true;
		} else {

			return false;
		}
    }

    public function deleteOrderDetail ($orderID) {

        $sql="DELETE FROM `orderdetails` WHERE OrderID = ".$orderID;
        $query= $this->db->query($sql);
        
        if ($query) {

			return true;
		} else {

			return false;
		}
    }

    public function showCartList($userID) {

        $sql = "SELECT * FROM `orderdetails` INNER JOIN `orders` ON orderdetails.OrderID = orders.OrderID WHERE orders.UserID = ".$userID." ORDER BY Status ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

   public function updateOrderStatus ($orderID) {
    
        $sql = "update orders set Status='".$_POST['status']."' where OrderID=".$orderID;
        $query= $this->db->query($sql);
        
        if ($query) {

			return true;
		} else {

			return false;
		}
    }

    public function updateProductStock ($productID,$quantity) {

        $sql = "update products set Stock= Stock -'".$quantity."' where ProductID=".$productID;
        $query= $this->db->query($sql);

        if ($query) {

            return true;
        } else {

            return false;
        }
    }

    public function checkProductStock ($productID,$quantity) {

        $sql = "SELECT * FROM `products` WHERE Stock > ".$quantity." AND PruductID = ".$productID;
        $query= $this->db->query($sql);
        return $query->num_rows() > 0;
    }
    

}


// EOF
