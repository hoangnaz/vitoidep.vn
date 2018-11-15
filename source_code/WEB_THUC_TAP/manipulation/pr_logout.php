<?php
	error_reporting(0);
	session_start();
	unset($_SESSION["info_customer"]);
	header("Location:../index.php");
?>