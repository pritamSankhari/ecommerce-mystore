<?php
	
	class _Error extends CI_Controller{

		function __construct(){

			parent::__construct();

			$this->load->helper(['url']);
		}

		function product_upload_error(){

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------

			// LOADING NAV BAR 2 VIEW
			// ----------------------
			$this->load->view('nav_bar_2');
			// ----------------------
			
			// LOADING UPLOAD ERROR VIEW
			// ----------------------
			$this->load->view('errors/product_upload_error');
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
		}

		function product_delete_error(){

			// LOADING HEADER VIEW
			// ----------------------
			$this->load->view('header');
			// ----------------------

			// LOADING NAV BAR 2 VIEW
			// ----------------------
			$this->load->view('nav_bar_2');
			// ----------------------
			
			// LOADING UPLOAD ERROR VIEW
			// ----------------------
			$this->load->view('errors/product_delete_error');
			// ----------------------

			// LOADING FOOTER VIEW
			// ----------------------
			$this->load->view('footer');
			// ----------------------
		}
	}

?>