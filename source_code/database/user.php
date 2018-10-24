<?php
	require 'connect_database.php';
	require '../library/common.php';
	require '../entities/customer.php';
    
    class user extends databaseConnect
    {
		
        public function connectDB(){
			$a = new common();
			echo $a->getCurrentTime();
            // $connect= Parent::connectDatabase();
            // return $connect;
        }
        
        function Insert_customer($customer)
		{
			$pdo=parent::conect_data();
			$query="INSERT INTO customer VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$PDO=$pdo->prepare($query);
			$customer=new customer();
			$customer->getId();
				$customer->getId(),
				$customer->getFull,
				$customer->account,
				$customer->pass,
				$customer->email,
				$customer->phoneNumber,
				$customer->$date,
				$customer->$sex,
				$customer->$address
			);
			$insert_customer=$PDO->execute($param);
			return $insert_customer;
			
		}
		
			function update_customer($fullname,$email,$phone_number,$address,$id_customer)
		{
			$pdo=parent::conect_data();
			$query="UPDATE `customer` SET `fullname`=?,`email`=?,`phone_number`=?,`address`=? WHERE `id_customer`=?";
			$PDO=$pdo->prepare($query);
			$param=array($fullname,$email,$phone_number,$address,$id_customer);
			$insert_customer=$PDO->execute($param);
			return $insert_customer;
			
		}

       
    }

	$a=new user();
	$a->connectDB();
?>