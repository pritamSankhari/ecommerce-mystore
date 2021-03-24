<?php

	function is_posted(){
		if(isset($_POST)&&!empty($_POST)){
			return 1;
		}
		return 0;
	}

	function is_logged_in(){
		if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
			return 1;
		}
		return 0;
	}

	function admin_logged_in(){
		if(isset($_SESSION['admin'])&&!empty($_SESSION['admin'])){
			return 1;
		}
		return 0;
	}

?>