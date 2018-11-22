<?php
    session_start();
    error_reporting(0);
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/order.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/customer.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/template/email/confirm_email.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/function/send_mail.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/library/const.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/detail_order.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/user_massage.php';
    const ORDER_SUCCESS = "Xác nhận đặt hàng thành công";
    if(isset($_REQUEST["txtFullName"])){
        $name=$_REQUEST["txtFullName"];
    }
    if(isset( $_REQUEST["txtPhone"])){
        $phone=$_REQUEST["txtPhone"];
    }
    if(isset($_REQUEST["txtEmail"])){
       $email=$_REQUEST["txtEmail"];;
    }
    if(isset($_REQUEST["txtAdress"])){
        $address=$_REQUEST["txtAdress"];
    }
    if(isset($_REQUEST["txtDelivery"])){
        $delivery=$_REQUEST["txtDelivery"];
    }
    $info=array(
        'name'=> $name,
        'phone'=> $phone,
        'email'=> 'nguyenanhhoangltqbh@gmail.com',
        'address'=> $address,
        'delivery'=> $delivery
    );
    
    $orderDB= new orderDB();
    $orderEntity= new order();
    if($_SESSION['customer']){
        $orderEntity->setIdCustomer($_SESSION['customer']->id_customer);
        $customerBL= new customerBL();
        $resutlUpdatePoint=$customerBL->updatePoint($_SESSION['total_price']/10000,$_SESSION['customer']->id_customer);
        if($resutlUpdatePoint==FAIL_PROCESS)
        {
            echo FAIL_PROCESS;
            return;
        }
    }else{
        $orderEntity->setIdCustomer(-99);
    }
   
    $orderEntity->setReciever($name);
    $orderEntity->setEmail($email);
    $orderEntity->setPhoneNumber($phone);
    $orderEntity->setAddressRecieve($address);
    $orderEntity->setDateOrder(getCurrentTime());
    $orderEntity->setTotalMoney($_SESSION['total_price']);
    $orderEntity->setStaffInCharge(1);
    $orderEntity->setStatusOrder(1);
    $resultAddOrder=$orderDB->insertOrder($orderEntity);
    $detailOrderBL= new detailOrderBL();
    if($resultAddOrder['result']==SUCCESS){
        foreach ($_SESSION['product_cart'] as $keyProduct => $valueProduct) {
            $price=((1-($valueProduct['info']->point_promotion/100))*$valueProduct['info']->price_product);
            $resultAddDetailOrder = $detailOrderBL->detailOrder($valueProduct['info']->id_product,
                                                $valueProduct['number'], $price,
                                                $price* $valueProduct['number'],
                                                $resultAddOrder['data']);
        }
        
       
    }
    // send email order of customer
    $tempalte= new template();
    $tempalteHTML= $tempalte->getTemplateEmailConfirm($info,$_SESSION["product_cart"]);
    $sendMail=new Mail();
    $resultSendMail = $sendMail->sendMail($email,$name,ORDER_SUCCESS,$tempalteHTML);
    
    //add message
    $userMassageBL= new userMassageBL();
    $contentMassage="<p>Bạn đã đặt đơn hàng thành công vào thời gian: ".getCurrentTime()."</p><p>Vui lòng kiểm tra tại tag đơn hàng của bạn</p>";
    $userMassageBL->massageUser($_SESSION['customer']->id_customer, $contentMassage);
    

    if($resultAddDetailOrder==200 &&  $resultSendMail==200){
        echo  200;
    }else{
     echo  400;
    }
   unset($_SESSION['product_cart']);
   unset($_SESSION['total_price']);
   unset( $_SESSION['info_order']);
?>