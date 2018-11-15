<?php
    session_start();
    error_reporting(1);
     require_once "../database/customer.php";
     require_once "../entities/customer.php";
     $customer= new customer("","","","","","","","","","","","");
     $customer->setId($_REQUEST['id_customer']);
     $customer->setAddress($_REQUEST['txtAdress']);
     $customer->setSex($_REQUEST['txtSex']);
     $customer->setSocialAccount($_REQUEST['txtSocialAccount']);
     $customer->setPhonenumber($_REQUEST['txtPhone']);
     $customer->setDOB($_REQUEST['txtDOB']);
     $connectDB = new  customerDB();
     $resultInsertCustomer=$connectDB->updateInfoCustomer($customer);
     if($resultInsertCustomer==400){
         echo '400';
     }
     elseif($resultInsertCustomer==101){
         echo '101';
     }
     else{
         $updateUser=$connectDB->getInfoCustomer($_REQUEST['id_customer']);
         $_SESSION['customer']=$updateUser;
         echo 200;
     }
?>