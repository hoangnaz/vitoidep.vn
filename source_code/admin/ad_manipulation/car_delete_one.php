<?php
	session_start();
	$id=$_POST['id'];

		unset($_SESSION["import_order"][$id]);
?>