<?php
	
	class Order extends CI_Controller{

		function __construct(){

			parent::__construct();
			$this->load->helper(['url','authentication']);
			session_start();
		}

		public function index(){

			// CHECKING USER LOGGED IN OR NOT
			// ----------------------
			if(!is_logged_in()){
				redirect(base_url());
				exit();
			}


			// CHECKING IS POSTED OR NOT
			// ----------------------
			if(!is_posted()){
				redirect(base_url());
				exit();
			}
			// ----------------------

			print_r($_POST);

			// LOADING ORDER MODEL
			// ----------------------
			$this->load->model('order_model');
			// ----------------------

			if($this->order_model->addOrder(uniqid('order_'),$_POST['u_id'],$_POST['p_id'],$_POST['order_time'],$_POST['contact_no'],$_POST['address'],$_POST['city'],$_POST['zip_code'],$_POST['from_ip'])){

				// SUCCESS
				redirect(site_url('success/order_placed'));
				exit();
			}
			redirect(base_url());
			exit();
		}


		// public function add(){

		// }
	}

?>