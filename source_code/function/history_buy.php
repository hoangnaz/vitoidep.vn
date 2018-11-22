<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/order.php';
    class orderHistory{
        function lstOrderOfUser(){
            $orderBL = new orderBL();
            $lstOrder=$orderBL->lstOrderFollowUser($_SESSION['customer']->id_customer);
            $arrayOrder=array("order"=>$lstOrder);
            $arrayOrder["user"]=$_SESSION['customer'];
            $totalMoney=0;
            foreach ($lstOrder as $key => $value) {
                $totalMoney+=$value->total_money_order;
                
            }
            $arrayOrder["totalMoney"]=$totalMoney;
            $arrayOrder["totalOrder"]=count($lstOrder);
           return $arrayOrder;
        }
       
    
    }
?>