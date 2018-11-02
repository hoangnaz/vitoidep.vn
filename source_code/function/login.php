<?php
    session_start();
    include '../database/customer.php';
   
    if(isset($_POST['txtEmail']) && isset($_POST['txtPassword']))
    {
 
        $customerDB=new customerDB();
        $checkLogin=$customerDB->loginCustomer($_REQUEST);

        if($checkLogin!=false)
        {
            $_SESSION['customer']=$checkLogin;
            echo 1;
        }
        else
        {
            echo 2;
        }
    }
   
?>