<?php
   
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/product_info.php';
    class search{
        function getValueSearch($value){
           
            $pro=new productDB();
            return $numberRecord=$pro->getProductSearch($value);
           
        }
    }
   
?>