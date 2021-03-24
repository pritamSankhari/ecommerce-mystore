<?php

	class Main extends CI_Controller{

		function __construct(){

			parent::__construct();
			$this->load->helper(['url','authentication','pagination']);
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

		public function index($page_no = 1){
			
			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------


			// CHECKING USER LOGGED IN OR NOT
			// ----------------------
			if(is_logged_in()){
				
				// LOADING USER NAV BAR
				// ----------------------
				$this->load->view('user/nav_bar.php');
				// ----------------------	
			}
			else{
				// LOADING PUBLIC NAV BAR
				// ----------------------
				$this->load->view('public/nav_bar.php');
				// ----------------------		
			}
			// ----------------------

			


			// LOADING PRODUCTS MODEL
			// ----------------------
			$this->load->model('product_model');
			
			// PAGINATION
			// ----------------------
			$totalPages=getTotalPages($this->product_model->countProduct());

			if($page_no>$totalPages) $page_no=1;
			
			$offset = ($page_no-1)*PRODUCT_IN_EACH_PAGE;
			// ----------------------


			// FETCHING ALL PRODUCT WITH LIMIT
			// ----------------------
			$data['products']=$this->product_model->fetchAllProducts($offset,PRODUCT_IN_EACH_PAGE);
			$data['total_pages']=$totalPages;
			// ----------------------
			$data['page_no']=$page_no;
			
			// IF NO. OF PRODUCT > 0
			if($data['products']){

				// LOADING PRODUCT VIEW
				$this->load->view('show_all_products',$data);
			}
			// ELSE
			else{
				$data['no_product_msg']="There is no product yet!";
				// LOADING PRODUCT VIEW
				$this->load->view('show_all_products',$data);	
			}
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
			
		}

		public function product($id){
			
			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------

			// CHECKING USER LOGGED IN OR NOT
			// ----------------------
			if(is_logged_in()){
				
				// LOADING USER NAV BAR
				// ----------------------
				$this->load->view('user/nav_bar.php');
				// ----------------------	
			}
			else{
				// LOADING PUBLIC NAV BAR
				// ----------------------
				$this->load->view('public/nav_bar.php');
				// ----------------------		
			}
			// ----------------------

			// LOADING PRODUCTS MODEL
			// ----------------------
			$this->load->model('product_model');
			// ----------------------

			if(!$data['product']=$this->product_model->fetchProductById($id)){
				$data['no_product_msg']='Product not found!';
			}

			// LOAD PRODUCT VIEW
			// ----------------------
			$this->load->view('show_product',$data);
			// ----------------------	

			

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
		}

		public function signup(){

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------


			// CHECKING USER LOGGED IN OR NOT
			// ----------------------
			if(is_logged_in()){
				
				// REDIRECT
				// ----------------------
				redirect(base_url());
				// ----------------------	

				exit();
			}
			else{
				// LOADING PUBLIC NAV BAR
				// ----------------------
				$this->load->view('public/nav_bar.php');
				// ----------------------		
			}
			// ----------------------

			// LOADING SIGN UP FORM VIEW
			// ----------------------
			$this->load->view('sign_up_form');
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
		}
	}


?>