<?php
	
	class Category extends CI_Controller{

		function __construct(){

			parent::__construct();
			$this->load->helper(['url','authentication']);

			session_start();
		}

		public function add(){

			// CHECKING IF POSTED OR NOT
			// -------------------------
			if(!is_posted()){
				redirect(site_url('admin'));
				exit();
			}
			// -------------------------

			// LOADING CATEGORY MODEL
			// ----------------------
			$this->load->model('category_model');
			// ----------------------

			// ADDING CATEGORY
			// ----------------------
			if($this->category_model->addCategory($_POST['cat_name'])){
				redirect(site_url('success/category_added'));
				exit();
			}
			redirect(site_url('admin'));
			exit();
			// ----------------------
		}
	}

?>