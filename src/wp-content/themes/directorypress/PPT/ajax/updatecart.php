<?php

/***************** DO NOT EDIT THIS FILE *************************
******************************************************************

INFORMATION:
------------

This is a core theme file, you should not need to edit 
this file directly. Code changes maybe lost during updates.

LAST UPDATED: June 26th 2011
EDITED BY: MARK FAIL
------------------------------------------------------------------

******************************************************************/

	session_id($_GET['sid']);
	//session_start();
	
	$path=dirname(realpath($_SERVER['SCRIPT_FILENAME']));
	$path_parts = pathinfo($path);
	$p = str_replace("wp-content","",$path_parts['dirname']);	
	$p = str_replace("themes","",$p);
	$p = str_replace("PPT","",$p);	
	$p = str_replace("directorypress","",$p);
	$p = str_replace("auctionpress","",$p);
	$p = str_replace("couponpresspress","",$p);
	$p = str_replace("shopperpress","",$p);
	$p = str_replace("realtorpress","",$p);
	$p = str_replace("directorypress","",$p);	
	$p = str_replace("template_","",$p);
	$p = str_replace("\\\\","",$p);
	$p = str_replace("////","",$p);
	 
	require( $p.'/wp-config.php' );
 	
	if($_GET['newprice']) {
		//protect against going below zero
		updateQty();
		$_SESSION['ddc']['price'] = updatePrice();
	} 
	
	if($_GET['action'] == "addproduct") {
	
	
 
		if(!isset($_SESSION['ddc']['productsincart'][$_GET['id']])) {

			$_SESSION['ddc']['productsincart'][$_GET['id']] = 0;
			//new array for this product info
			$_SESSION['ddc'][$_GET['id']]['shipping'] 			= $_GET['ship'];			
			$_SESSION['ddc'][$_GET['id']]['custom1'] 			= $_GET['c1'];
			$_SESSION['ddc'][$_GET['id']]['custom2'] 			= $_GET['c2'];
			$_SESSION['ddc'][$_GET['id']]['custom3'] 			= $_GET['c3'];
			$_SESSION['ddc'][$_GET['id']]['custom4'] 			= $_GET['c4'];
			$_SESSION['ddc'][$_GET['id']]['custom5'] 			= $_GET['c5'];
			$_SESSION['ddc'][$_GET['id']]['custom6'] 			= $_GET['c6'];
			$_SESSION['ddc'][$_GET['id']]['custom7'] 			= $_GET['c7'];
		
			$_SESSION['ddc']['productsincart'][$_GET['id']]++;
			//$_GET['qty']--;
			$ID4QTY = $_GET['id'];
			
 		} else {

			if( strlen($_GET['c1']) > 1 || strlen($_GET['c2']) > 1 || strlen($_GET['c3']) > 1 || strlen($_GET['c4']) > 1 || strlen($_GET['c5']) > 1 || strlen($_GET['c6']) > 1 || strlen($_GET['c7']) > 1 ){

						$ID4QTY = $_GET['id']."000".date("s");
						$_SESSION['ddc'][$ID4QTY]['main_ID'] 	= $_GET['id'];
						$_SESSION['ddc']['productsincart'][$ID4QTY] = 0;
						//new array for this product info			
						$_SESSION['ddc'][$ID4QTY]['shipping'] 	= $_GET['ship'];
						
						$_SESSION['ddc'][$ID4QTY]['custom1'] 	= $_GET['c1'];
						$_SESSION['ddc'][$ID4QTY]['custom2'] 	= $_GET['c2'];
						$_SESSION['ddc'][$ID4QTY]['custom3'] 	= $_GET['c3'];
						$_SESSION['ddc'][$ID4QTY]['custom4'] 	= $_GET['c4'];
						$_SESSION['ddc'][$ID4QTY]['custom5'] 	= $_GET['c5'];
						$_SESSION['ddc'][$ID4QTY]['custom6'] 	= $_GET['c6'];
						$_SESSION['ddc'][$ID4QTY]['custom7'] 	= $_GET['c7'];
	
						$_SESSION['ddc']['productsincart'][$ID4QTY]++;
						

			}else{
 
				$_SESSION['ddc']['productsincart'][$_GET['id']]++;
				$ID4QTY = $_GET['id'];

			}
		}

		while($_GET['qty'] > 1){
			$_SESSION['ddc']['productsincart'][$ID4QTY]++;
			$_GET['qty']--;
		}


		updateQty();
		updatePrice();
		
	}

 	
	if($_GET['action'] == "removeproduct") {

 		if($_SESSION['ddc']['productsincart'][$_GET['id']] == 1) {

			unset($_SESSION['ddc']['productsincart'][$_GET['id']]);
			//unset($_SESSION['ddc'][$_GET['id']]['custom1']);

		} else {
			$_SESSION['ddc']['productsincart'][$_GET['id']]--;
		}
		updateQty();
		updatePrice();
	}	


	if($_GET['action'] == "increaseQty") {

		$_SESSION['ddc']['productsincart'][$_GET['id']]++;
		
		updateQty();
		updatePrice();
	}	
	
	if($_GET['action'] == "removeproductallqty") {
		unset($_SESSION['ddc']['productsincart'][$_GET['id']]);

		updateQty();
		updatePrice();
	}
	
	if($_GET['action'] == "changeqty") {	
		$_SESSION['ddc']['productsincart'][$_GET['id']] = $_GET['qty'];
		updateQty();
		$_SESSION['ddc']['price'] = updatePrice();
	}
	
	if($_GET['action'] == "gettotal") {	
		updateQty();
		echo updatePrice();
	}
 
	updatePrice();
	updateQty();
	$_SESSION['ddc']['price'] = updatePrice();
	
	session_write_close();	
?>