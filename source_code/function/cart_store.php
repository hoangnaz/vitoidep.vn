<?php
	error_reporting(0);
	session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/product_info.php';
    $id_pro=$_GET["id_product"];
	$number_buy=$_GET["number"];
    $pro=new productDB();
	$productInformation= $pro->getInfoProduct($id_pro);
	$_SESSION["product_cart"][$id_pro];
	// check exist of product in cart. 
	if(array_key_exists($id_pro,$_SESSION["product_cart"])){
		// check number max can buy
		if($productInformation->quantity_inventory <= ($number_buy + $_SESSION["product_cart"][$id_pro]["number"]) ){
			
			$return_arr["result"] = 400;
			$return_arr["data"] = array("cart"=>$_SESSION["product_cart"]);
			$return_arr["alert"] = "Hiện tại chúng tôi chỉ còn ".$productInformation->quantity_inventory." sản phẩm";
			echo json_encode($return_arr);
			
		}else{
			// exist product. Increment one unit.
			$_SESSION["product_cart"][$id_pro]["number"]+=$number_buy;
			$_SESSION["product_cart"][$id_pro]["info"]=$productInformation;
			$return_arr["result"] = SUCCESS;
			$return_arr["data"] = array("cart"=>$_SESSION["product_cart"]);
			$return_arr["alert"] = "ok";
			echo json_encode($return_arr);
		}
	}
	else{
		if($productInformation->quantity_inventory==0){
			echo FULL_PRODUCT;
		}else{
			// if not exist. Init number of product is 1
			if($productInformation->quantity_inventory <= $number_buy  ){
			
				echo "Hiện tại chúng tôi chỉ còn ".$productInformation->quantity_inventory." sản phẩm";
			}else{
				// exist product. Increment one unit.
				$_SESSION["product_cart"][$id_pro]["number"]=$number_buy;	
				$_SESSION["product_cart"][$id_pro]["info"]=$productInformation;
			
			$return_arr["result"] = SUCCESS;
			$return_arr["data"] = array("cart"=>$_SESSION["product_cart"]);
			$return_arr["alert"] = "ok";
			echo json_encode($return_arr);
			}
			
		}		
	}
?>
