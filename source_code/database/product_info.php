<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/database/connect_database.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/library/common.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/library/const.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/entities/product_info.php';
  
    class productDB extends databaseConnect
    {
        public const TABLE_NAME = 'product_info';
        public const CONDITION = 'sub_catalog';
        public const CONDITION_FAST_SEARCH = 'name_product';
        public const CONDITION_NAME_VN = 'name_product_no_vietnamse';
        public const CONDITION_GET_ONE_PRODUCT = 'id_product';
        
      
     
        //Get all product in table

		public function getAllProduct()
		{
            $pdo=parent::connectDatabase();
			return getAllRecord($pdo,self::TABLE_NAME);
			
        }

            // Get information one product
        public function getInfoProductBaseNameVietNam($value){
            $pdo=parent::connectDatabase();
			return getOneRecordFollowCondition($pdo,self::TABLE_NAME,self::CONDITION_NAME_VN,$value);
        }

        // Get information one product
        public function getInfoProduct($value){
            $pdo=parent::connectDatabase();
			return getOneRecordFollowCondition($pdo,self::TABLE_NAME,self::CONDITION_GET_ONE_PRODUCT,$value);
        }
        
        // Get product follow option (feature, new ..)

        public function getProductFollowOption($value){
            $pdo=parent::connectDatabase();
			return getRecordFollowCondition($pdo,self::TABLE_NAME,self::CONDITION,$value);
        }

        

         // Get product by search

         public function getProductSearch($value){
            $pdo=parent::connectDatabase();
            $conditionSearch['conditon']=self::CONDITION_FAST_SEARCH;
            $conditionSearch['value']=$value;
			return getRecordFollowConditionLike($pdo,self::TABLE_NAME,$conditionSearch);
        }
         public function getFiveTopProduct(){
             $pdo=parent::connectDatabase();
             $sqlQuery="SELECT COUNT(`product`) AS `top5`,`product` FROM `detail_info_order` GROUP BY product ORDER BY `top5` DESC LIMIT 0,5";
             $PDO=$pdo->prepare($sqlQuery);
             $PDO->execute();
             return $PDO->fetchAll(PDO::FETCH_OBJ);
        }
        

       

        //Get product follow condition with atrribute.

		public function getProductPagnition($startPosition,$numberRecord,$atrribute)
		{
          
            $pdo=parent::connectDatabase();
			return getPagnationRecord($pdo,$startPosition,$numberRecord,$atrribute);
			
        }
        
        //Get product follow condition with atrribute.

		public function getProductPagnitionByEqual($startPosition,$numberRecord,$valueSearch)
		{
          
            $pdo=parent::connectDatabase();
			return getPagnationHightLightAndStatus($pdo,$startPosition,$numberRecord,$valueSearch);
			
        }
        


         // get list product hightlight in index home

         public function getHightLightProductAndNew($conditionSearch){
            $pdo=parent::connectDatabase();
			return getRecordFollowConditionLike($pdo,self::TABLE_NAME,$conditionSearch);
        }


	}

   
    //print_r($pro->getProductPagnition(0,10,'son_gac'));
    // count($pro->getAllProduct());
    // print_r($pro->getProductFollowOption('status_product',2));
// if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header('WWW-Authenticate: Basic realm="Vui lòng nhập thông tin username và password"');
//    header('HTTP/1.0 401 Unauthorized');
//    echo 'Text to send if user hits Cancel button';
//    exit;
// } else {
//    $username = $_SERVER['PHP_AUTH_USER'];
//    $password = $_SERVER['PHP_AUTH_PW'];
//    if($username == 'ten_xac_thuc' && $password == 'mk_xac_thuc') {
//       echo 'Đăng nhập ứng dụng thành công';
//    }else {
// 	header('WWW-Authenticate: Basic realm="Vui lòng nhập thông tin username và password"');
// 	header('HTTP/1.0 401 Unauthorized');
//    }
//}
	
?>