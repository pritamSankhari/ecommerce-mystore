<?php

	class User extends CI_Controller{

		function __construct(){

			parent::__construct();

			$this->load->helper(['url','authentication']);
			
			// LOADING url HELPER
			// ----------------------
			// $this->load->helper('url');
			// ----------------------
			session_start();
		}

		function signin(){



			// CHECK IF POSTED OR NOT
			// ----------------------
			if(!is_posted()){
				redirect(base_url());				
			}
			// ----------------------


			// AUTHENTICATE
			// ----------------------

			// LOAD USER MODEL
			// ----------------------
			$this->load->model('user_model');
			// ----------------------

			$user = $this->user_model->userLoggedIn($_POST['email'],$_POST['password']);
			
			if(!isset($user['error'])||empty($user)){
				
				$_SESSION['user']['id']=$user['id'];
				$_SESSION['user']['name']=$user['name'];
				$_SESSION['user']['login_id']=uniqid('li');
			}
			
			else{

				$_SESSION['login_error']['msg']=$user['err_msg']; // REFERENCE: model/user_model

				if($_POST['order_flag']){
					redirect(site_url('main/product/'.$_POST['order_flag']));
				}
			}

			if($_POST['order_flag']){

				// SUCCESS
				redirect(site_url('main/product/'.$_POST['order_flag']));
				exit();
			}

			else{

				// SUCCESS
				redirect(base_url());
				exit();	
			}
			
		}

		function my_orders(){

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

			else redirect(base_url());

			// GET MY ORDERS
			// ----------------------
			// LOADING USER MODEL
			// ----------------------
			$this->load->model('user_model');
			// ----------------------
			$data['orders']=$this->user_model->getMyOrders($_SESSION['user']['id']);
			// ----------------------

			// LOADING CUSTOMER MY ORDERS VIEW
			// -------------------------------
			$this->load->view('user/my_orders',$data);
			// -------------------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
		}

		function signout(){

			// CHECK IF POSTED OR NOT
			// ----------------------
			if(!isset($_POST)||empty($_POST)){
				redirect(base_url());				
			}
			// ----------------------

			// SUCCESS
			session_destroy();
			redirect(base_url());
			exit();
		}

		function signup(){

			// CHECK IF POSTED OR NOT
			// ----------------------
			if(!is_posted()){
				redirect(base_url());				
			}
			// ----------------------


			// AUTHENTICATE
			// ----------------------

			// LOAD USER MODEL
			// ----------------------
			$this->load->model('user_model');
			// ----------------------

			if($this->user_model->insert($_POST['name'],$_POST['email'],$_POST['pwd'],$_POST['contact_no'],$_POST['address'],$_POST['city'],$_POST['pin_code'])){

				// SUCCESS
				redirect(base_url());
			}

			// ERROR
			redirect(base_url());

		}
	}

?>