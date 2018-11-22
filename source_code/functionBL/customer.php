<?php
error_reporting(0);
     require_once $_SERVER['DOCUMENT_ROOT'].'/database/customer.php';
     require_once $_SERVER['DOCUMENT_ROOT'].'/entities/customer.php';
     class customerBL{
          public function updatePoint($point,$userId){
                    $customer= new customer("","","","","","","","","","","","");   
                    $customerDB=new customerDB();
                    $customer->setPoint($point);
                    $customer->setId($userId);
               return $customerDB->updatePointCustomer($customer);

          }
          
     }

   
?>  