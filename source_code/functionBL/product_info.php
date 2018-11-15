<?php
   
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/product_info.php';
   
    class product{
        public const CONDITION_HIGHT = 'highlights';
        public const CONDITION_NEW = 'status_product';
        function getHightLightProduct($value){
            $pro=new productDB();
            $conditionSearch['conditon']= "highlights";
            $conditionSearch['value']= $value;
            return $numberRecord=$pro->getHightLightProductAndNew($conditionSearch);  
        }
        function getNewProduct($value){
            $pro=new productDB();
            $conditionSearch['conditon']= "status_product";
            $conditionSearch['value']= $value;
            return $numberRecord=$pro->getHightLightProductAndNew($conditionSearch);  
        }
    }
    $productBL= new product();
	// list san pham noi bat
	$lstHighLightProduct= array_slice($productBL->getHightLightProduct(1),-9);
?>
    