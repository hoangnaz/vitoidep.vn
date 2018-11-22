<?php
	session_start();
	unset($_SESSION["import_order"]);
	header("Location:../sub_import_bill.php");
?>