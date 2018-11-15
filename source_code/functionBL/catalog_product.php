<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/catalog_product.php';
  
	require_once $_SERVER['DOCUMENT_ROOT'].'/database/sub_catalog.php';
    
    class catalogProduct{
            function lstSubProduct()
            {
                $dbCatalogProduct= new catalogProductDB();
                $dbSubcatalog=new subCatalogDB();
                $lstCatalogProduct=$dbCatalogProduct->getListCatalogProduct();
                $arrayMenu=array();
                foreach ($lstCatalogProduct as $key => $value) {
                    $lstSubCatalog=$dbSubcatalog->getSubCatalogFollowCondition($value->id_catalog_product);
                    $arrayMenu[$value->catalog_name]=$lstSubCatalog;
                }
                return $arrayMenu;

            }
    }

   
?>