<?php
    session_start();
    include '../database/customer.php';
    $newPass=sha1($_POST['password']);
    
    $connectDB = new  customerDB();
    $updatePassword=$connectDB->updatePassword($newPass,$_POST['id_customer']);
    if($updatePassword==200){
      echo 200;
    }
    else{
        echo 400;
    }

?>