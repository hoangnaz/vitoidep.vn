<?php
    error_reporting(0);
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/connect_database.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/library/common.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/library/const.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/entities/detail_order.php';

    class detailOrderDB extends databaseConnect{
		const TABLE_NAME= '`detail_info_order`';
		const ID_USER= 'id_order';
		const ASC= 'ASC';
		const DESC= 'DESC';
		const VALUE_SORT='product';
        public function insertDetailOrder($detailOrder)
		{
			$pdo=parent::connectDatabase();
			$query="INSERT INTO `detail_info_order` VALUES (?,?,?,?,?)";
			$paramQuery = array(
				$detailOrder->getProduct(),
				$detailOrder->getQuantityOneProduct(),
				$detailOrder->getPriceProduct(),
				$detailOrder->getTotalMoneyProductOrder(),
				$detailOrder->getIdOrder()
			);
			return insertUpadeRecord($pdo,$paramQuery,$query);	
		}

		public function getDetailOrderFollowUser($userOrder)
		{
			$pdo=parent::connectDatabase();
			return getRecordFollowConditionOrderBy($pdo,self::TABLE_NAME,self::ID_USER,$userOrder,self::VALUE_SORT,self::DESC);	
		}

		
    }
    
?>