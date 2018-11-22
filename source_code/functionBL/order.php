<?php
     require_once $_SERVER['DOCUMENT_ROOT'].'/database/order.php';
     require_once $_SERVER['DOCUMENT_ROOT'].'/entities/order.php';
     class orderBL{
         function lstOrderFollowUser($userID){
                $orderDB= new orderDB();
               return $orderDB->getOrderFollowUser($userID);
         }
     }
     
   
?>  