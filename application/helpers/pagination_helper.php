<?php
	
	if(!defined('PRODUCT_IN_EACH_PAGE')) define('PRODUCT_IN_EACH_PAGE',6);

	function getTotalPages($totalProducts,$productsInEachPage=PRODUCT_IN_EACH_PAGE){

		return ceil($totalProducts/$productsInEachPage);
	}

?>