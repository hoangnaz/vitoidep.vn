<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/connect_database.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/library/common.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/entities/order.php';
    class orderDB extends databaseConnect{
		const TABLE_NAME= '`order`';
		const ID_USER= 'id_customer';
		const ASC= 'ASC';
		const DESC= 'DESC';
		const VALUE_SORT='date_order';

        public function insertOrder($order)
		{
			$pdo=parent::connectDatabase();
			$chkIdOrder = true;	
			while($chkIdOrder){
				$idOrder="ORDER".date("Ymd").'ST'.rand(1000,9999);
				$chkIdOrder = checkUniqueAccount($pdo,"`order`","`id_order`",$idOrder);
			}
			$order->setIdOrder($idOrder);
			
			
			$query="INSERT INTO `order` VALUES (?,?,?,?,?,?,?,?,?,?)";
			$paramQuery = array(
				$order->getIdOrder(),
				$order->getIdCustomer(),
				$order->getReciever(),
				$order->getEmail(),
				$order->getPhoneNumber(),
				$order->getAddressRecieve(),
				$order->getDateOrder(),
				$order->getTotalMoney(),
				$order->getStaffInCharge(),
				$order->getStatusOrder()
			);
			$result = insertUpadeRecord($pdo,$paramQuery,$query);
			if($result == SUCCESS){
				return array("result"=>SUCCESS,"data"=>$idOrder);
			}else{
				return array("result"=>FAIL_PROCESS,"data"=>null);
			}
		}
		public function getOrderFollowUser($idOrder)
		{
			$pdo=parent::connectDatabase();
			return getRecordFollowConditionOrderBy($pdo,self::TABLE_NAME,self::ID_USER,$idOrder,self::VALUE_SORT,self::DESC);	
		}
		
    }
    // $new= new orderDB();
    // $order= new order();
    // $order->setIdOrder("12324343");
    // $order->setIdCustomer("12");
    // $order->setReciever("hoang");
    // $order->setEmail("nguyenah");
    // $order->setPhoneNumber("09332323");
    // $order->setAddressRecieve("qa");
    // $order->setDateOrder(getCurrentTime());
    // $order->setTotalMoney(2323232);
    // $order->setStaffInCharge(1);
    // $order->setStatusOrder(1);
    // echo $new->insertOrder($order);
?>