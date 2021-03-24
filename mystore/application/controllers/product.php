<?php

	class Product extends CI_Controller{

		function __construct(){

			parent::__construct();
			$this->load->helper(['url','authentication','file_upload']);
			
			// LOADING url HELPER
			// ----------------------
			// $this->load->helper('url');
			// ----------------------
			// LOADING form HELPER
			// ----------------------
			// $this->load->helper('form');
			// ----------------------

			// LOADING authentication HELPER
			// ----------------------
			// $this->load->helper('authentication');
			// ----------------------

			session_start();
		}

		public function confirm_order(){
			
			// CHECKING USER LOGGED IN OR NOT
			// ----------------------
			if(!is_logged_in()){
				redirect(base_url());
				exit();
			}
			// ----------------------

			// CHECKING IS POSTED OR NOT
			// ----------------------
			if(!is_posted()){
				redirect(base_url());
				exit();
			}
			// ----------------------

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------	

			// LOADING USER NAV BAR
			// ----------------------
			$this->load->view('user/nav_bar.php');
			// ----------------------

			// LOADING USER MODEL
			// ----------------------
			$this->load->model('user_model');
			// ----------------------

			$user = $this->user_model->userById($_SESSION['user']['id']);
			
			if(isset($user['error'])&&!empty($user['error'])){

				$data['err_msg']=$user['err_msg'];
			}

			$data['user']=$user;
			$data['p_id']=$_POST['p_id'];

			// LOADING MAIN VIEW
			// ----------------------
			$this->load->view('confirm_product',$data);
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------

		}

		public function add(){

			// CHECKING ADMIN LOGGED IN OR NOT
			// ----------------------
			if(!admin_logged_in()){
				redirect(base_url());
				exit();
			}
			// ----------------------

			// CHECKING IS POSTED OR NOT
			// ----------------------
			if(!is_posted()){
				redirect(base_url());
			}
			// ----------------------

			// print_r($_POST);

			// UPLOADING IMAGE FILE
			// ----------------------
			if(!$path=upload_product_image($_FILES['image'],$_POST['p_image_name'])){
				
				redirect(site_url('_error/product_upload_error'));
				exit();
			}
			// ----------------------
			
			// LOADING PRODUCTS MODEL
			// ----------------------
			$this->load->model('product_model');
			// ----------------------

			// ADDING PRODUCT
			// ----------------------
			if($this->product_model->addProduct($this->product_model->newValidId(),$_POST['p_category'],$_POST['p_title'],$_POST['p_details'],$_POST['p_tags'],$_POST['p_stock'],$_POST['p_price'],$path)){

				// SUCCESS
				redirect(site_url('success/product_added'));
				exit();
			}	
			// ----------------------
			
			redirect(site_url('admin'));
			exit();

		}

		public function delete(){
			
			// CHECKING ADMIN LOGGED IN OR NOT
			// ----------------------
			if(!admin_logged_in()){
				redirect(base_url());
				exit();
			}
			// ----------------------

			// CHECKING IS POSTED OR NOT
			// ----------------------
			if(!is_posted()){
				redirect(base_url());
			}
			// ----------------------			

			// LOADING PRODUCTS MODEL
			// ----------------------
			$this->load->model('product_model');
			// ----------------------

			// FETCHING PRODUCT BY ID
			// ----------------------
			if($product = $this->product_model->fetchProductById($_POST['p_id'])){

				print_r($product);	
				
				
			}
			// ----------------------

			try{
				// DELETING PRODUCT IMAGE FILE
				// ----------------------
				unlink($product['image']);
				// ----------------------
			}
			catch(Exception $e){

				// FAIL TO DELETE IMAGE FILE !
				redirect(site_url('_error/product_delete_error'));
				// exit();
			}

			// DELETING PRODUCT BY ID
			// ----------------------
			if($this->product_model->deleteById($_POST['p_id'])){

				

				// SUCCESS
				redirect(site_url('success/product_deleted'));
				
			}
			// ----------------------

			redirect(site_url('_error/product_delete_error'));
			exit();
			
		}

		public function show_search_result($name){

			// CHECKING IS POSTED OR NOT
			// ----------------------
			// if(!is_posted()){
			// 	redirect(base_url());
			// }
			// ----------------------

			// LOADING PRODUCTS MODEL
			// ----------------------
			$this->load->model('product_model');
			// ----------------------


			$data['products']=$this->product_model->fetchProductByTag($name);	

			// echo json_encode($result);		
			$this->load->view('search_results',$data);

		}

		public function show_search_result_admin($name){

			// LOADING PRODUCTS MODEL
			// ----------------------
			$this->load->model('product_model');
			// ----------------------


			$data['products']=$this->product_model->fetchProductByTag($name);	

			// echo json_encode($result);		
			$this->load->view('admin/search_results',$data);
		}

	}

?>