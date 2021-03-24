<?php

	class Order_Model extends CI_Model{

		function __construct(){

			parent::__construct();

			// LOADING DATABASE CONNECTION
			// ----------------------------------
			$this->load->database();
			// ----------------------------------
		}

		public function addOrder($id,$c_id,$p_id,$time,$contact,$address,$city,$zip_code,$ip){

			$sql = "INSERT INTO orders(id,customer_id,product_id,time,contact_no,address,city,zip_code,order_from_ip) VALUES('$id','$c_id','$p_id','$time','$contact','$address','$city','$zip_code','$ip')";

			if($this->db->query($sql)) return true;
			return false;
		}



		// FETCH ALL ORDERS WITH USERS
		// SQL : SELECT orders.id as id, orders.customer_id as customer_id,orders.product_id as product_id, orders.time as time,orders.address as address_2 , orders.city as city_2 ,orders.zip_code as zip_code_2,orders.contact_no as contact_no_2 , users.name , users.email, users.contact_no , users.address,users.city,users.zip_code  FROM orders inner join users on orders.customer_id = users.id

		public function fetchAllOrdersWithUsers(){

			$sql = "SELECT orders.id as id, orders.customer_id as customer_id,orders.product_id as product_id, orders.time as time,orders.address as address_2 , orders.city as city_2 ,orders.zip_code as zip_code_2,orders.contact_no as contact_no_2 , users.name , users.email, users.contact_no , users.address,users.city,users.zip_code  FROM orders inner join users on orders.customer_id = users.id";

			if($r = $this->db->query($sql)){
				return $r->result_array();
			}

			return false;
		}

		public function fetchAllOrders(){

			$sql = "SELECT orders.id as id, orders.customer_id as customer_id, orders.time as time,orders.address as address_2 , orders.city as city_2 ,orders.zip_code as zip_code_2,orders.contact_no as contact_no_2  FROM orders inner join users on orders.customer_id = users.id";

			if($r = $this->db->query($sql)){
				return $r->result_array();
			}

			return false;
		}
	}

?>