<?php
	error_reporting(0);
	session_start();
	$id_pro=$_POST["id"];
	include("../database/select_data.php");
	$query_data=new select_data();
	$info_pro_buy=$query_data->query_one_product($id_pro);
	$newproduct[$id_pro]=array('id_product'=>$info_pro_buy->id_product,'image'=>$info_pro_buy->image_product,'name_product'=>$info_pro_buy->name_product,"price_import"=>0);

	if(!$_SESSION["import_order"] || $_SESSION["import_order"]==NULL)
	{
		$newproduct[$id_pro]["number"]=1;
		$_SESSION["import_order"][$id_pro]=$newproduct[$id_pro];
	}
	else
	{
		
		if(array_key_exists($id_pro,$_SESSION['import_order']))
		{
			$_SESSION['import_order'][$id_pro]['number']++;
	
		}
		else
		{
			$newproduct[$id_pro]['number']=1;
			$_SESSION['import_order'][$id_pro]=$newproduct[$id_pro];
		
		}
	}
	
?>
