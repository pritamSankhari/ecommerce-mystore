<?php
	
	if(!defined('UPLOAD_PRODUCT_IMAGE_PATH')) define('UPLOAD_PRODUCT_IMAGE_PATH','uploads/products/');
	
	function upload_product_image($file,$name){

		
		// print_r($file);

		$fileExtension = pathinfo($file['name'])['extension'];

		if(!isset($name)||empty($name)){
			$name=uniqid('PROD_'.uniqid());
		}

		$target_file = UPLOAD_PRODUCT_IMAGE_PATH.$name.'.'.$fileExtension;

		try{

			if(move_uploaded_file($file["tmp_name"], $target_file)){
				return $target_file;
			}	
			return 0;
		}
		catch(Exception $e){
			return 0;	
		}

	}

?>