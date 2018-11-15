<?php
    session_start();
    include '../database/customer.php';
    $file=$_FILES['myfile'];
    $path=$_GET['id_customer'];
    $resultUploadFile=uploadImage($file,$path);
    switch ($resultUploadFile){
        case FAIL_EXTENSION_FILE:{
           echo  "Chưa đúng định dạng file";
           break;
        }
       
        case FAIL_MAX_FILE:{
            echo "File chứa dung lượng quá lớn;";
            break;
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
                header("Location:../index.php");
            }
        }
       
    }
 
    
?>