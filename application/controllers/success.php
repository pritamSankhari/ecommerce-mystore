<?php
	
	class Success extends CI_Controller{

		function __construct(){

			parent::__construct();
			$this->load->helper(['url','authentication']);
		}

		function product_added(){

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------

			// LOADING NAV BAR 2 VIEW
			// ----------------------
			$this->load->view('nav_bar_2');
			// ----------------------

			// LOADING SUCCESS VIEW
			// ----------------------
			$this->load->view('success/product_added');
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
		}

		function category_added(){
			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------

			// LOADING NAV BAR 2 VIEW
			// ----------------------
			$this->load->view('nav_bar_2');
			// ----------------------

			// LOADING SUCCESS VIEW
			// ----------------------
			$this->load->view('success/category_added');
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------	
		}

		function order_placed(){
			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------

			// LOADING NAV BAR 2 VIEW
			// ----------------------
			$this->load->view('nav_bar_2');
			// ----------------------

			// LOADING SUCCESS VIEW
			// ----------------------
			$this->load->view('success/order_placed');
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------	
		}

		function product_deleted(){

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------

			// LOADING NAV BAR 2 VIEW
			// ----------------------
			$this->load->view('nav_bar_2');
			// ----------------------

			// LOADING SUCCESS VIEW
			// ----------------------
			$this->load->view('success/product_deleted');
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
		}


	}

?>