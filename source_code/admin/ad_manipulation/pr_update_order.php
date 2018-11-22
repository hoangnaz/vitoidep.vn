<?php
	session_start();
	echo $id=$_POST['id_pro'];
	echo $quatity=$_POST['quatity'];
	echo $price_import=$_POST['import_price'];
	$_SESSION["import_order"][$id]["number"]=$quatity;
	$_SESSION["import_order"][$id]["price_import"]=$price_import;
	
?>