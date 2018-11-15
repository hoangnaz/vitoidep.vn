<?php
	session_start();
	unset($_SESSION["cart"]);
	$_SESSION["number_buy"]=0;
	header("Location:../index.php");
?>