<?php
	require 'connect_database.php';
	require '../library/common.php';
	require '../library/const.php';
	require '../entities/staff.php';

    class staffDB extends databaseConnect
    {
		
		public function loginStaff($request)
		{
			$pdo=parent::connectDatabase();
			$query="SELECT * FROM `customer` WHERE (`staff_account` LIKE ? AND `pass` LIKE ?) OR (`email` LIKE ? AND `pass` LIKE ?)";
			$paramQuery=array($request['account'],  sha1($request['pass']),$request['account'], sha1($request['pass']));
			return checkLogin($pdo,$paramQuery,$query);
			
		}

		public function getInfoStaff(){
			 $idCustomer = $_REQUEST["id_customer"];
			$pdo=parent::connectDatabase();
			$query="SELECT * FROM `staff` WHERE id_staff= ?";
			$paramQuery=array($idCustomer);
			return getOneRecord($pdo,$paramQuery,$query);
		 }

        public function insertStaff($customer)
		{
			$pdo=parent::connectDatabase();
			$value = check_unique_accout($pdo,"staff",'staff_account',$customer->getAccount());
			$value = check_unique_accout($pdo,"staff",'email',$customer->getEmail());	
			if($value == true)
			{
				return ERROR_UNIUQE;
			}
			
			$query="INSERT INTO staff VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$paramQuery = array(
                $customer->getId(),
                $customer->getAccount(),
				$customer->getFullname(),
				$customer->getPassword(),
				$customer->getEmail(),
				$customer->getPhonenumber(),
				$customer->getDOB(),
                $customer->getSex(),
				$customer->getAddress(),
				$customer->getRole(),
				$customer->getStatus(),
				getCurrentTime(),
				getCurrentTime()
			);
			return insertUpadeRecord($pdo,$paramQuery,$query);	
		}
		
		function updateInfoCustomer($staff){
			$pdo=parent::connectDatabase();
			$query="UPDATE `staff` SET 
									`fullname`=?,
									`email`=?,
									`phone_number`=?,
									`DOB`=?,
									`sex`=?,
									`address`=?,
									`status`=?,
									`staff_role`=?,
									`update_date`=?
									 WHERE `id_staff`=?"; 
			$inforStaff=$this->getInfoStaff($staff->getId());
			
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

		function updateRole($staff){
			$pdo=parent::connectDatabase();
			$query="UPDATE `customer` SET 
									`role`=?,
									`update_date`=?
									WHERE `id_staff`=?"; 
			$infoCustomer=$this->getInfoCustomer($customer->getId());
		
			$paramQuery=array(
				$customer->getPoint(),
				getCurrentTime(),
				$customer->getId()
			);
			return insertUpadeRecord($pdo,$paramQuery,$query);	
			
		}

	}
	

	//   $custome= new sta('', 'nguyen anh hoang','bongd3as','123', '31233@gmail.com',
	//    '0933333333', 'Nam','1994-02-07','qiamg',30,2222);
    //   //	print_r($_REQUEST);
    //     //$custome=new customer();
    //   // $user=new customerDB();
    //   echo sha1($_REQUEST['pass'],false);
    //   die;
    //   $ab=new customerDB();
    //   print_r($ab->loginCustomer($_REQUEST));
      
      
  
  
    //   die;
      // if($ab->loginCustomer($_REQUEST)==false){
      // 	echo 123;
      // }	
      // else{
      // 	print_r($ab->loginCustomer($_REQUEST));
      // }
  
      //  $user->updatePoint($custome);
        echo 123;
      // //$a= getenv('REMOTE_ADDR');
      // //return phpinfo();
      // echo $_SERVER['HTTP_USER_AGENT'] ;
?>