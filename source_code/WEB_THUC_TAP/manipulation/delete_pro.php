<?php
	session_start();
	$id=$_POST['id'];
	unset($_SESSION["cart"][$id]);
	$_SESSION["number_buy"]=count($_SESSION['cart']);
?>