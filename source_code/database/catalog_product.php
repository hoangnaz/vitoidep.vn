<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/database/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/library/common.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/entities/catalog_product.php';

    class catalogProductDB extends databaseConnect
    {
        const TABLE_NAME = 'catalog_product';
		public function getListCatalogProduct(){
			
			$pdo=parent::connectDatabase();
			return getAllRecord($pdo,self::TABLE_NAME);
         }
    }
    
?>