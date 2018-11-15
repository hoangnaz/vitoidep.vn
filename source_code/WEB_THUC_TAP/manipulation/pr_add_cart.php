<?php
	error_reporting(0);
	session_start();
	$id_pro=$_POST["id"];
	$number_buy=$_POST["number"];
	include("../admin/database/select_data.php");
	$query_data=new select_data();
	$info_pro_buy=$query_data->query_one_product($id_pro);
	if($info_pro_buy->promotion_product>0)
	{
		$price=($info_pro_buy->price_product)*(1-($info_pro_buy->promotion_product/100));
	}
	
	elseif($info_pro_buy->promotion_product==0)
	{
		$price=$info_pro_buy->price_product;
	}
	$newproduct[$id_pro]=array('id_product'=>$info_pro_buy->id_product,'image'=>$info_pro_buy->image_product,'promotion'=>$info_pro_buy->promotion_product,'name_product'=>$info_pro_buy->name_product,'price'=>$price);
	

	if(!$_SESSION["cart"] || $_SESSION["cart"]==NULL)
	{
		$newproduct[$id_pro]["number"]=1;
		$_SESSION["cart"][$id_pro]=$newproduct[$id_pro];
	}
	else
	{
		
		if(array_key_exists($id_pro,$_SESSION['cart']))
		{
			$_SESSION['cart'][$id_pro]['number']++;
			if($_SESSION['cart'][$id_pro]['number']>$info_pro_buy->quantity_inventory)
			{
				echo "Xin lỗi, bạn chỉ có thể mua tối đa ".$info_pro_buy->quantity_inventory." sản phẩm này";
				$_SESSION['cart'][$id_pro]['number']=$info_pro_buy->quantity_inventory;
			}
	
		}
		else
		{
			$newproduct[$id_pro]['number']=1;
			$_SESSION['cart'][$id_pro]=$newproduct[$id_pro];
		
		}
	}
	$_SESSION["number_buy"]=count($_SESSION['cart']);

?>
