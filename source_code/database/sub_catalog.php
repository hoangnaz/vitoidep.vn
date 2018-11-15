<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/connect_database.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/library/common.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/entities/sub_catalog.php';

    class subCatalogDB extends databaseConnect
    {
        private const TABLE_NAME = 'sub_catalog';
        private const FIELD_CONDITION = 'catalog_id';
  
        public function getListSubCatalog()
        {
			$pdo=parent::connectDatabase();
			return getAllRecord($pdo,self::TABLE_NAME);
         }

         public function getSubCatalogFollowCondition($idProductCatalog)
         {
            $pdo=parent::connectDatabase();
            $lstSub = getRecordFollowCondition($pdo,self::TABLE_NAME,self::FIELD_CONDITION,$idProductCatalog);
            return $lstSub;
         }

         
    }
    
?>