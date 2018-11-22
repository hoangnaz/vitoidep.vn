<?php
	error_reporting(0);
	session_start();
	unset($_SESSION["import_order"]);
	unset($_SESSION['pro_pu']);
	header("location:../mn_bill_import.php");
?>