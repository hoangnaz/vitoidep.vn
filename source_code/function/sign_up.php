<?php
    require_once "../database/customer.php";
    require_once "../entities/customer.php";
    $customer= new customer("","","","","","","","","","","","","");
    $customer->setFullname($_REQUEST['txtFullName']);
    $customer->setAccount($_REQUEST['txtAccount']);
    $customer->setEmail($_REQUEST['txtEmail']);
    $customer->setPassword(sha1($_REQUEST['txtPass']));
    $connectDB = new  customerDB();
    $resultInsertCustomer=$connectDB->insertCustomer($customer);
    if($resultInsertCustomer==400){
        echo '400';
    }
    elseif($resultInsertCustomer==101){
        echo '101';
    }
    else{
        echo '200';
    }
?>