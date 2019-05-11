<?php
    session_start();
    include '../database/customer.php';
    unset( $_SESSION['error_image']);
    $file=$_FILES['myfile'];
    $path=$_GET['id_customer'];
    $resultUploadFile=uploadImage($file,$path);
    switch ($resultUploadFile){
        case FAIL_EXTENSION_FILE:{
            $_SESSION['error_image'] = "Chưa đúng định dạng file hoặc dung lượng quá lớn";
           header("Location:../user_info.php"); 
           
        }
        default:{
            $connectDB = new  customerDB();
            $imageSource=$path.'/'.$file['name'];
            $updateAvatar=$connectDB->updateAvatar($imageSource,$_GET['id_customer']);
            if($updateAvatar==200){
                $updateUser=$connectDB->getInfoCustomer($_GET['id_customer']);
                $_SESSION['customer']->avatar=$updateUser->avatar;
                header("Location:../user_info.php"); 
            }
            else{
                header("Location:../index");
            }
        }
       
    }
 
    
?>