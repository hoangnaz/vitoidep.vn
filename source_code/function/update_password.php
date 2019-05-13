<?php
    session_start();
    include '../database/customer.php';
    $newPass=sha1($_POST['password']);
    if(sha1($_POST['old_pass']) != $_POST['currentPass'] ){
      echo 300;
    }
    $connectDB = new  customerDB();
    $updatePassword=$connectDB->updatePassword($newPass,$_POST['id_customer']);
    if($updatePassword==200){
      echo 200;
    }
    else{
        echo 400;
    }

?>