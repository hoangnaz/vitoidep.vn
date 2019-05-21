<?php
   
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/product_info.php';
    error_reporting(0);
    class product{
         const CONDITION_HIGHT = 'highlights';
         const CONDITION_DAU_GOI_SUA_TAM = 'dau_goi_sua_tam';
         const CONDITION_CARE_SKIN = 'cham_soc_da_mat';
         const CONDITION_NEW = 'status_product';
        function getHightLightProduct($value){
            $pro=new productDB();
            $conditionSearch['conditon']= "highlights";
            $conditionSearch['value']= $value;
            return $numberRecord=$pro->getHightLightProductAndNew($conditionSearch);  
        }

        function getListDauGoiSuaTam(){
            $pro=new productDB();
            $conditionSearch['conditon']= "sub_catalog";
            $conditionSearch['value']= self::CONDITION_DAU_GOI_SUA_TAM;
            return $numberRecord=$pro->getHightLightProductAndNew($conditionSearch);  
        }
        function getListCareSkin(){
            $pro=new productDB();
            $conditionSearch['conditon']= "sub_catalog";
            $conditionSearch['value']= self::CONDITION_CARE_SKIN;
            return $numberRecord=$pro->getHightLightProductAndNew($conditionSearch);  
        }


        

        function getNewProduct($value){
            $pro=new productDB();
            $conditionSearch['conditon']= "status_product";
            $conditionSearch['value']= $value;
            return $numberRecord=$pro->getHightLightProductAndNew($conditionSearch);  
        }
        function getOneProductFollowName($value){
            $pro=new productDB();
            return  $productInfo= $pro->getInfoProductBaseNameVietNam($value);
        }
        function getSameProduct($value){
            $pro=new productDB();
            return  $productInfo= $pro->getProductFollowOption($value);
        }

    }
    $productBL= new product();
	// list san pham noi bat
	$lstHighLightProduct= array_slice($productBL->getHightLightProduct(1),-9);
?>
    