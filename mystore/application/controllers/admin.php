<?php
	
	class Admin extends CI_Controller{

		function __construct(){

			parent::__construct();
			$this->load->helper(['url','authentication','pagination']);

			session_start();
		}

		public function index($page_no = 1){

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------
			
			// CHECKING ADMIN LOGGED IN OR NOT
			// ----------------------
			if(!admin_logged_in()){
				$this->load->view('admin/login_form');
			}
			// ----------------------

			else{
				// LOADING ADMIN NAV BAR VIEW
				// ----------------------
				$this->load->view('admin/nav_bar');
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
					$this->load->view('admin/show_all_products',$data);
				}
				// ELSE
				else{
					$data['no_product_msg']="There is no product yet!";
					// LOADING PRODUCT VIEW
					$this->load->view('admin/show_all_products',$data);	
				}
				// ----------------------
			}

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
		}

		public function signin(){

			// CHECKING IF POSTED OR NOT
			// -------------------------
			if(!is_posted()){
				redirect(site_url('admin'));
				exit();
			}
			// -------------------------

			if($_POST['admin_id']=='admin123'&&$_POST['admin_pwd']=='admin123'){
				$_SESSION['admin']['id']=$_POST['admin_id'];
				$_SESSION['admin']['login_id']=uniqid('admin');
				redirect(site_url('admin'));
				exit();
			}
			
		}

		public function signout(){
			
			// CHECKING IF POSTED OR NOT
			// -------------------------
			if(!is_posted()){
				redirect(site_url('admin'));
				exit();
			}
			// -------------------------

			session_destroy();
			redirect(site_url('admin'));
			exit();	
		}

		public function add_category(){

			// CHECKING ADMIN LOGGED IN OR NOT
			// ----------------------
			if(!admin_logged_in()){
				
				redirect(site_url('admin'));
				exit();
			}
			// ----------------------

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------
			
			// LOADING ADMIN NAV BAR VIEW
			// ----------------------
			$this->load->view('admin/nav_bar');
			// ----------------------			
			

			// LOADING ADD CATEGORY FORM
			// ----------------------
			$this->load->view('admin/add_category_form');
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------

		}

		public function add_product(){

			// CHECKING ADMIN LOGGED IN OR NOT
			// ----------------------
			if(!admin_logged_in()){
				
				redirect(site_url('admin'));
				exit();
			}
			// ----------------------

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------
			
			// LOADING ADMIN NAV BAR VIEW
			// ----------------------
			$this->load->view('admin/nav_bar');
			// ----------------------			
			
			// LOADING CATEGORY MODEL
			// ----------------------
			$this->load->model('category_model');			
			// ----------------------			

			$data['categories']=$this->category_model->fetchAllCategories();

			// LOADING ADD PRODUCT FORM
			// ----------------------
			$this->load->view('admin/add_product_form',$data);
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------

		}

		public function show_orders(){
			
			// CHECKING ADMIN LOGGED IN OR NOT
			// ----------------------
			if(!admin_logged_in()){
				
				redirect(site_url('admin'));
				exit();
			}
			// ----------------------

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------
			
			// LOADING ADMIN NAV BAR VIEW
			// ----------------------
			$this->load->view('admin/nav_bar');
			// ----------------------						

			// LOADING ORDER MODEL
			// ----------------------
			$this->load->model('order_model');			
			// ----------------------

			// FETCHING ALL ORDERS
			// ----------------------
			if($data['orders']=$this->order_model->fetchAllOrdersWithUsers()){
				$this->load->view('admin/show_orders',$data);
			}
			// ----------------------

			else{
				// NO ORDER PAGE
				// $this->load->view('admin/show_orders',$data);	
			}

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
		}
	}

?>