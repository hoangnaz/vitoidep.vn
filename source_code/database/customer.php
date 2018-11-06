<?php
	require 'connect_database.php';
	require '../library/common.php';
	require '../entities/customer.php';

    class customerDB extends databaseConnect
    {

		public function loginCustomer($request)
		{
			$pdo=parent::connectDatabase();
			
			
			$query="SELECT * FROM `customer` WHERE (`account` LIKE ? AND `password` LIKE ?) OR (`email` LIKE ? AND `password` LIKE ?)";
			$paramQuery=array($request['txtEmail'],  sha1($request['txtPassword']),$request['txtEmail'], sha1($request['txtPassword']));
			return checkLogin($pdo,$paramQuery,$query);
			
		}

		public function getInfoCustomer(){
			 $idCustomer = $_REQUEST["id_customer"];
			$pdo=parent::connectDatabase();
			$query="SELECT * FROM `customer` WHERE id_customer= ?";
			$paramQuery=array($idCustomer);
			return getOneRecord($pdo,$paramQuery,$query);
		 }

        public function insertCustomer($customer)
		{
			$pdo=parent::connectDatabase();
			$chkIdCustomer = true;	
			while($chkIdCustomer){
				$idCustomer="CUS".rand(1000000,9999999);
				$chkIdCustomer = checkUniqueAccount($pdo,"customer","id_customer",$idCustomer);
			}
			
			$customer->setId($idCustomer);
			$chkEmail = checkUniqueAccount($pdo,"customer",'email',$customer->getEmail());	
			if($chkEmail == true)
			{
				return 400;
			}
			$chkAccount = checkUniqueAccount($pdo,"customer",'account',$customer->getAccount());
			if($chkAccount == true)
			{
				return 400;
			}
			
			$query="INSERT INTO customer VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$paramQuery = array(
				$customer->getId(),
				$customer->getFullname(),
				$customer->getAccount(),
				$customer->getPassword(),
				$customer->getEmail(),
				$customer->getPhonenumber(),
				$customer->getSex(),
				$customer->getDOB(),
				$customer->getAddress(),
				$customer->getPoint(),
				$customer->getSocialAccount(),
				getCurrentTime(),
				getCurrentTime()
			);
			return insertUpadeRecord($pdo,$paramQuery,$query);	
		}
		
		function updateInfoCustomer($customer){
			$pdo=parent::connectDatabase();
			$query="UPDATE `customer` SET 
									`fullname`=?,
									`email`=?,
									`phone_number`=?,
									`DOB`=?,
									`sex`=?,
									`address`=?,
									`point`=?,
									`social_account`=?,
									`update_date`=?
									 WHERE `id_customer`=?"; 
			$infoCustomer=$this->getInfoCustomer($customer->getId());
			
			if(empty($customer->fullname))
			{	
				$customer->setFullname($infoCustomer->fullname);
			}
			if(empty($customer->email))
			{
				$customer->setEmail($infoCustomer->email);
			}
			if(empty($customer->phoneNumber))
			{
				$customer->setPhonenumber($infoCustomer->phone_number);
			}
			
			if(empty($customer->DOB))
			{
				$customer->setDOB($infoCustomer->DOB);
			}
			if(empty($customer->sex))
			{
				$customer->setSex($infoCustomer->sex);
			}
			if(empty($customer->address))
			{
				$customer->setAddress($infoCustomer->address);
			}
			if(!empty($customer->point))
			{
				$customer->setPoint($infoCustomer->social_account);
			}
			if(!empty($customer->socialAccount))
			{
				$customer->setSocialAccount($infoCustomer->social_account);
			}
			$paramQuery=array(
				$customer->getFullname(),
				$customer->getEmail(),
				$customer->getPhonenumber(),
				$customer->getSex(),
				$customer->getDOB(),
				$customer->getAddress(),
				$customer->getPoint(),
				$customer->getSocialAccount(),
				getCurrentTime(),
				$customer->getId()
			);
			return insertUpadeRecord($pdo,$paramQuery,$query);	
			
		}

		function updatePointCustomer($customer){
			$pdo=parent::connectDatabase();
			$query="UPDATE `customer` SET 
									`point`=?,
									`update_date`=?
									WHERE `id_customer`=?"; 
			$infoCustomer=$this->getInfoCustomer($customer->getId());
		
			$paramQuery=array(
				$customer->getPoint(),
				getCurrentTime(),
				$customer->getId()
			);
			return insertUpadeRecord($pdo,$paramQuery,$query);	
			
		}

	}


// 	$custome= new customer('', 'nguyen anh hoang','bongd3as','123', '31233@gmail.com',
// 	'0933333333', 'Nam','1994-02-07','qiamg',30,2222);
// //    //	print_r($_REQUEST);
// // 	$custome=new customer();
//  	$user=new customerDB();
//  	echo $user->insertCustomer($custome);
// 	echo 123;
	
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