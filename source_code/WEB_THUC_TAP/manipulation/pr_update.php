<?php
	error_reporting(0);
	session_start();
	$id=$_POST['id_ro'];
	$quatity=$_POST['quatity'];
	$_SESSION["cart"][$id]["number"]=$quatity;
	
?>