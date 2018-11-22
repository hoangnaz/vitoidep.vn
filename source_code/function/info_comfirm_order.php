<?php
    session_start();
    error_reporting(0);
    $_SESSION['info_order']['full_name']=$_SESSION['customer']?$_SESSION['customer']->fullname:'';
    $_SESSION['info_order']['address']=$_SESSION['customer']?$_SESSION['customer']->address:'';
    $_SESSION['info_order']['phone_number']=$_SESSION['customer']?$_SESSION['customer']->phone_number:'';
    $_SESSION['info_order']['email']=$_SESSION['customer']?$_SESSION['customer']->email:'';
?>