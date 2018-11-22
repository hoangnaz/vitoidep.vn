<?php
session_start();
include("../database/select_data.php");
$select_data=new select_data();
include("../database/update_insert.php");
$info_bill=$select_data->info_order($_GET['id_order']);
$data_insert=new insert_update_data();

	if(isset($_POST['upt_order']))
	{
		echo $_GET['id_order'];
		echo $_GET['id_staff'];
		echo $staff=$_POST['role_admin'];
		if($_POST['role_admin']=="")
		{
			$staff=$_GET['id_staff'];
		}
		$data_insert->insert_bill_order($_GET['id_order'],date("Y-m-d"),$_SESSION["info_staff"]["id_staff"]);
		$data_insert->update_staff_manage_order($_GET['id_order'],$staff,$_GET['or_status']);	
		
		if($info_bill->id_customer==1)
		{
			 $name_customer=$info_bill->reciever;
		}
		else
		{
			$name_customer=$select_data->query_one_customer($info_bill->id_customer)->fullname;

		}
		$date_deliver=date("d-m-Y",(strtotime(date("Y-m-d"))+"2 day"));
					
			$content="Xin chào ".$name_customer."! Chúng tôi vui mừng thông báo đơn hàng #".$_GET['id_order']." của bạn đã được chúng tôi phân công và chuẩn bị giao hàng đến bạn.<p> Nhân viên chúng tôi sẽ  giao hàng cho bạn dự kiến ngày ".$date_deliver." Nếu có bất kỳ thay đổi về ngày gửi. Vui lòng gửi mail phản hồi cho chúng tôi.</p> Hãy nhanh chóng ghé thăm <a href='http://localhost/WEB_THUC_TAP/index.php'> WEBHOCDUONG </a> để tìm thấy nhiều sản phẩm tốt hơn nữa nhé. Chúng tôi xin cảm ơn.";
	 			include_once("../smtpgmail/class.phpmailer.php");
        		$mail=new PHPMailer();
						$mail->IsSMTP(); // Chứng thực SMTP
						$mail->SMTPAuth=TRUE;
						$mail->Host="smtp.gmail.com";
						$mail->Port=465;
						$mail->SMTPSecure="ssl";
				/* Server google*/
						$mail->Username="webhocduong@gmail.com"; // Nhập mail 
						$mail->Password="webhocduong7294"; // Mật khẩu
				/* Server google*/
						$mail->CharSet="utf-8";
				
		

				$mail->Subject="THÔNG BÁO CHUẨN BỊ GIAO HÀNG";
				$mail->MsgHTML($content);
				$mail->AddAddress($info_bill->email, "Content feedback"); // Mail người nhận
			
					if(!$mail->Send())
					{
						echo "<p class='text-center'>"."Lỗi".$mail->ErrorInfo."</p>";
						
					}
					else
					{
						
						
							echo "<p class='text-center text-info'>"."Đã gửi thông báo</p>";
						
						
					}	
					
				
	}
	else if($_GET['status']==3)
		{
			if($info_bill->status_order==1)
			{
				$lst_product=$select_data->list_product_in_order($_GET['id_order']);
				foreach($lst_product as $lst)
				{
					$pro=$select_data->query_one_product($lst->id_product);
					$pro_number=$pro->quantity_inventory-($lst->pro_quantity);
					$data_insert->update_quantity_inventory_product($lst->id_product,$pro_number);
				
				}
			}
		
					$data_insert->update_status_order($_GET['status'],$_GET['id_order'],3);
					
			
				
		if($info_bill->id_customer==1)
		{
			$name_customer=$info_bill->reciever;
		}
		else
		{
			$name_customer=$select_data->query_one_customer($info_bill->id_customer)->fullname;
		}
			$content="<p>Xin chào ".$name_customer."!<p><p> Đơn hàng #".$_GET['id_order']." của bạn đã thanh toán và  giao hàng thành công.</p><p>Chúng tôi xin chân thành cảm ơn bạn đã mua hàng tại website của chúng tôi.</p> Hãy nhanh chóng ghé thăm <a href='http://localhost/WEB_THUC_TAP/index.php'> WEBHOCDUONG </a> để tìm thấy nhiều sản phẩm tốt hơn nữa nhé. Chúng tôi xin cảm ơn.";
	 			include_once("../smtpgmail/class.phpmailer.php");
        		$mail=new PHPMailer();
						$mail->IsSMTP(); // Chứng thực SMTP
						$mail->SMTPAuth=TRUE;
						$mail->Host="smtp.gmail.com";
						$mail->Port=465;
						$mail->SMTPSecure="ssl";
				/* Server google*/
						$mail->Username="webhocduong@gmail.com"; // Nhập mail 
						$mail->Password="webhocduong7294"; // Mật khẩu
				/* Server google*/
						$mail->CharSet="utf-8";
				
			//	$mail->SetFrom("Feedback AVR");

				$mail->Subject="XÁC NHẬN HOÀN TẤT ĐƠN HÀNG";
				$mail->MsgHTML($content);
				$mail->AddAddress($info_bill->email, "Content feedback"); // Mail người nhận
			
					if(!$mail->Send())
					{
						echo "<p class='text-center'>"."Lỗi".$mail->ErrorInfo."</p>";
						
					}
					else
					{
						
						
							echo "<p class='text-center text-info'>"."Đã gửi thông báo</p>";
						
						
					}
				
			  		
					
		}
		
?>