<?php
      require_once $_SERVER['DOCUMENT_ROOT'].'/database/sub_catalog.php';

      class subCatalogBL{
            function listSubCatalog(){
                  $connect=new subCatalogDB();
                  return $lstCatalog=$connect->getListSubCatalog();
            }
      }
     
?>