<?php
	session_start();

	//check if product is already in the cart
	if(isset($_SESSION['hallid'])){
		$_SESSION['hallid'] = $_GET['id'];
	}
    header("location:checklogin.php");

?>