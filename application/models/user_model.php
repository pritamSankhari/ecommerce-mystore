<?php

	class User_Model extends CI_Model{

		function __construct(){

			parent::__construct();
			$this->load->database();
		}

		public function userLoggedIn($email,$password){
		
			$query = $this->db->query("SELECT * FROM users WHERE email = '".$email."'");

			if(!$query->num_rows){
				return array('error'=>1,'err_msg'=>'Invalid Email');
			}
			
			$result = $query->result_array();

			if($result[0]['password']==$password){
				return $result[0];
			}

			return array('error'=>2,'err_msg'=>'Wrong Password!');
		}

		public function userById($id){

			$query = $this->db->query("SELECT * FROM users WHERE id = '$id'");
			
			if(!$query->num_rows){
				return array('error'=>3,'err_msg'=>'User does not exist !');
			}

			$result = $query->result_array();

			return $result[0];

		}

		public function insert($name,$email,$password,$contact_no,$address,$city,$zip_code){
			$id=uniqid("CUSTOMER_");
			$sql="INSERT INTO users(id,name,email,password,contact_no,address,city,zip_code) VALUES('$id','$name','$email','$password','$contact_no','$address','$city','$zip_code')";

			if($this->db->query($sql)){
				return true;
			}
			return false;
		}

		public function getMyOrders($id){

			// $sql="SELECT * FROM `orders` inner join `products`  on orders.product_id=products.id "
			$sql="SELECT * FROM `orders` inner join `products`  on orders.product_id=products.id WHERE customer_id='$id'";

			$query = $this->db->query($sql);
			
			if(!$query->num_rows){
				return false;
			}

			$result = $query->result_array();

			return $result;
		}
	}

?>