<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/database/product_info.php';
$_SESSION['search_value']=$_REQUEST['term'];
$pro=new productDB();
$numberRecord=$pro->getProductSearch($_SESSION['search_value']);
$listProduct=array();
$stringProduct="'[";
$count=0;
foreach ($numberRecord as $key => $value) {
    if($count <= (count($numberRecord)-2) ){
      
        $stringProduct.=('"'.$value->name_product.'",');
    }
    else{
        $stringProduct.=('"'.$value->name_product.'"');
        $stringProduct.="]'";
    }
    
    $count++;
   
}

echo  str_replace("'","",$stringProduct);

?>
