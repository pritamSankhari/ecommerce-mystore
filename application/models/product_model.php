<?php

class Product_Model extends CI_Model{

	function __construct(){

		parent::__construct();

		// LOADING DATABASE CONNECTION
		// ----------------------------------
		$this->load->database();
		// ----------------------------------
	}
	

	// FETCH ALL PRODUCTS FROM DATA BASE
	// SQL : SELECT * FROM products
	// ----------------------------------
	public function fetchAllProducts($offset,$n){

		$sql = "SELECT * FROM products LIMIT $offset,$n";

		if($result=$this->db->query($sql)){
			
			if($result->num_rows>0){
				
				return $result->result_array();
			}
			return false;
		}
		return false;
		
	}
	// ----------------------------------

	// COUNT NO. OF PRODUCTS 
	// ----------------------------------
	public function countProduct(){
		
		$sql = "SELECT count(id) AS N FROM products";
		
		$result = $this->db->query($sql);

		if($result){
			return $result->result_array()[0]['N'];
		}
		return false;
	}
	// ----------------------------------

	public function fetchProductById($id){

		$sql = "SELECT * FROM products WHERE id='$id'";
		$result = $this->db->query($sql);

		if($result->num_rows>0){
			return $result->result_array()[0];
		}
		return false;
	}

	public function fetchProductByTag($tag){

		$sql = "SELECT * FROM products WHERE tags LIKE '%$tag%' OR name LIKE '$tag%'";
		$result = $this->db->query($sql);

		if($result->num_rows>0){
			return $result->result_array();
		}
		return false;
	}

	public function deleteById($id){
		$sql = "DELETE FROM products WHERE id='$id'";
		$result = $this->db->query($sql);
		
		if($result){
			return true;
		}
		return false;
	}

	public function addProduct($id,$cat_id,$name,$details,$tags,$stock,$price,$image){

		$sql = "INSERT INTO products(id,category_id,name,details,tags,stock,price,image) VALUES('$id','$cat_id','$name','$details','$tags',$stock,$price,'$image')";

		if($this->db->query($sql)) return true;
		return false;
	}

	public function newValidId(){

		$id=uniqid('p_'.uniqid());
		while(true){
			$sql = "SELECT * FROM products WHERE id='".$id."'";
			
			$result = $this->db->query($sql);	
			
			if($result->num_rows()==0) return $id;

			$id=uniqid('p_'.uniqid());
		}
		
	}

}

	
?>