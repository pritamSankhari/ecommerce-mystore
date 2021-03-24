<?php

	class Category_Model extends CI_Model{

		function __construct(){

			parent::__construct();
			$this->load->database();
		}

		public function addCategory($name){

			$id=uniqid('cat_');

			$sql = "INSERT INTO categories(id,name) VALUES('$id','$name')";

			if($this->db->query($sql)){
				return true;
			}
			return false;

		}

		public function fetchAllCategories(){

			$sql = "SELECT * FROM categories";

			$result=$this->db->query($sql);
			
			if($result->num_rows>0){
				return $result->result_array();
			}
			return 0;
		}
	}

?>