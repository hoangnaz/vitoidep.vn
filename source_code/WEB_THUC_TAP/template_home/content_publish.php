<div id="list_product_find">
</div>
	 <?php

		if((isset($_POST['btn_house_pay']) || ($_SESSION["protect"]==$_GET["id_protect"] && $_GET["active_payment"]==3)) &&($_SESSION["cart"] && $_SESSION["cart"]!=NULL) )
		{
			$_SESSION["protect"];
			 $_GET["id_protect"];
			 $_GET["active_payment"];
		?>			 			<!- KET THUC MENU NEW-!>
					 			<div class="row">
					 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
						 					<p class="text-info text-center">ĐƠN HÀNG CỦA BẠN ĐÃ XÁC NHẬN THÀNH CÔNG.
			CHÚNG TÔI XIN CẢM ƠN VÌ ĐÃ TIN TƯỞNG VÀ MUA SẢN PHẨM CỦA CHÚNG TÔI. CHÚNG TÔI SẼ SỚM GIAO HÀNG ĐẾN BẠN.</p>
						 				</div>
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 					<p class="text-center" style="padding-top:10px;">Thông tin chi tiết đơn hàng của bạn</p><div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4 info_shopping_cart_left">
                                                <div class="alert alert-success alert-dismissable">
                                                     <p>Email:<?php echo  $_SESSION["info_customer_order"]["txt_email_cus"]?></p>
                                                        
                                                  <p>Số điện thoại:<?php echo  $_SESSION["info_customer_order"]["txt_phone_cus"]?></p>
                                                
                                                 <p>Tên khách hàng:<?php echo  $_SESSION["info_customer_order"]["txt_full_name_cus"]?></p>
                                                    <p>Số lượng loại sản phẩm: <?php echo $number_product=count($_SESSION['cart'])?></p>
                                                    
                                                    <p>Tổng tiền: <?php
                                                        echo number_format($_SESSION["total_money"]);
                                                    ?> VNĐ</p>
                                                    <p>Hình thức thanh toán:
                                                   <?php
                                                    if(isset($_POST['btn_house_pay']))
                                                    {
                                                        echo $thanh_toan="Giao hàng và thanh toán tại nhà";
                                                    }
                                                    else if($_SESSION["protect"]==$_GET["id_protect"] && $_GET["active_payment"]==3)
                                                    {
                                                        echo $thanh_toan="Đã thanh toán online";
                                                    }
													else
													{
														echo "<h2 class='text-danger'>Xin lỗi. Bạn chưa xác nhận hình thức thanh toán. Đơn hàng sẽ không được thực hiện.</h2>";
													}
                                                   ?>
                                                    
                                                   
                                                      <p>Địa chỉ giao hàng:<?php echo  $_SESSION["info_customer_order"]["txt_address_cus"]?></p>
                                                </div>
                                            </div>
                                            
												
						 					</div>
						 					
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info_detail_product" id="top_view_cart">
							 				
							 				<table class="table table-bordered">
							 					<thead id="title_table_view_cart">
							 						<tr>
							 							<th>Tên sản phẩm</th>
							 							<th>Hình ảnh</th>
							 							<th>Số lượng</th>
							 							<th>Đơn giá / sản phẩm</th>
							 							<th>Tổng tiền</th>
							 							
							 						</tr>
							 					</thead>
							 					<tbody>
                                                <?php
												$number=0;
												$total_money=0;
                                                	foreach($_SESSION["cart"] as $key=>$value)
													{
												?>
							 						<tr>
                                                    	<td><?php echo $value["name_product"] ?></td>
							 							<td><img src="admin/assert/product/<?php echo $value["image"] ?>" class="img-responsive" alt="Image" width="100px"></td>
							 						
							 							<td  width="100px"><p><?php echo $value["number"] ?></p></td>
							 							<td><?php echo number_format($value["price"]) ?> VNĐ</td>
							 							<td><?php echo number_format($value["price"]*$value["number"])?>VNĐ</td>
							 							
							 							
							 						</tr>
                                                    <?php
													$number+=$value["number"];
													$total_money+=($value["price"]*$value["number"]);
													}
													
													?>
							 						
							 					</tbody>
							 				</table>
						 					
						 				</div>
						 				
						 				
						 				
					 					
					 				</div>
					 				
				 			</div>		
				 			
			 			
		 		<?php
				}
				else
				{
					 $_SESSION["protect"];
			 $_GET["id_protect"];
			 $_GET["active_payment"]
					?>
					<div class="row">
					 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
						 					<h2 class="text-danger text-center">XIN LỖI. QUÁ TRÌNH XÁC NHẬN HÌNH THỨC THANH TOÁN CỦA BẠN CHƯA ĐƯỢC THỰC HIỆN. CHÚNG TÔI RẤT TIẾC KHÔNG THỂ XÁC NHẬN ĐƠN HÀNG CỦA BẠN. VUI LÒNG <a href="payment.php">CLICK TẠI ĐÂY ĐỂ KIỂM TRA LẠI</a></h2>
						 				</div>
                           </div>
                     </div> 
						<?php				
				}
				?>	   
                	
                
		<?php
         if((isset($_POST['btn_house_pay']) || ($_SESSION["protect"]==$_GET["id_protect"] && $_GET["active_payment"]==3)) &&($_SESSION["cart"] && $_SESSION["cart"]!=NULL))
			{
				if($_SESSION["info_customer"]["id_customer"]=="")
				{
					 $id_customer=1;
				}
				else
				{
					
					 $id_customer=$_SESSION["info_customer"]["id_customer"];
					
					
				}
				
					include_once("admin/database/select_data.php");
					$select_data=new select_data();
					do
					{
						 $id_order=date('l').date('d').date('m').rand(1111,9999);// l sẽ trả về ngày trong tuần tiếng anh.
						$result_compare_id=$select_data->check_id_order($id_order);
					}
					while($result_compare_id==1);
					 $reciever=$_SESSION["info_customer_order"]["txt_full_name_cus"];
					 $email=$_SESSION["info_customer_order"]["txt_email_cus"];
					 $phone_nummber=$_SESSION["info_customer_order"]["txt_phone_cus"];
					 $address_recieve=$_SESSION["info_customer_order"]["txt_address_cus"];
					 $total_money=$_SESSION["total_money"];
					 $date_order=date("Y-m-d");
					$staff=1;
					if(isset($_POST['btn_house_pay']))
					{
					 $status_order=1;
					}
					else if($_SESSION["protect"]==$_GET["id_protect"] && $_GET["active_payment"]==3)
					{
						 $status_order=2;
					}
					
					include("admin/database/update_insert.php");
					$in_up_data=new insert_update_data();
					$kq=$in_up_data->insert_order($id_order,$id_customer,$reciever,$email,$phone_nummber,$address_recieve,$date_order,$total_money,$staff,$status_order);
				
					foreach($_SESSION["cart"] as $key=>$value)
													{
														$id_detail_import_bill="";
														$ksq=$in_up_data->insert_order_detail($value["id_product"], $value["number"],$value["price"]*$value["number"],$id_order);
														if($_SESSION["protect"]==$_GET["id_protect"] && $_GET["active_payment"]==3)
														{
														$pro=$select_data->query_one_product($value["id_product"]);
														$pro_number=$pro->quantity_inventory-( $value["number"]);
														$in_up_data->update_quantity_inventory_product($value["id_product"],$pro_number);
														}
													
														
														
													}
													
			
		
		
		
		
		
		
		$content=' <p class="text-warning">Xin chào:'.$_SESSION["info_customer_order"]["txt_full_name_cus"].' Chúng tôi xác nhận đã nhận được thông tin đơn đặt hàng #'.$id_order.' từ bạn.</p><div>
                                                     <h3 style="style="padding-left:100px; color:#669933;"> THÔNG TIN ĐƠN HÀNG CỦA BẠN:</h3>
                                                        
                                                  <p style="padding-left:30px;">Số điện thoại:'.$_SESSION["info_customer_order"]["txt_phone_cus"].'</p>
                                                
                                                
                                                    <p style="padding-left:30px;">Số lượng loại sản phẩm: '.$number_product.'</p>
                                                    
                                                    <p style="padding-left:30px;">Tổng tiền: '.number_format($_SESSION["total_money"]).' VNĐ</p>
                                                    <p style="padding-left:30px;">Hình thức thanh toán:'
                                                  .$thanh_toan.'<p style="padding-left:30px;">Địa chỉ giao hàng:'.$_SESSION["info_customer_order"]["txt_address_cus"];
		
		$content.="<table style='border:1px solid;'>
				<tr style='border:1px solid; background-color:#0C6;'>
							 					<th >Tên sản phẩm</th>
							 					<th >Số lượng</th>
												<th>Đơn giá / sản phẩm</th>
					 							<th >Tổng tiền</th>
							 							
							 						</tr>
							 					
							 					<tbody style='border:1px solid;'>";
                                                
											
                                                	foreach($_SESSION["cart"] as $key=>$value)
													{
												
							 						$content.="<tr style='border:1px solid;'>
                                                    	<td style='border:1px solid;'>".$value["name_product"]."</td>
							 							<td style='border:1px solid;'><p>".$value["number"]."</p></td>
							 							<td style='border:1px solid;'>".number_format($value["price"])." VNĐ</td>
							 							<td style='border:1px solid;'>".number_format($value["price"]*$value["number"])."VNĐ</td>
							 							
							 							
							 						</tr>";
													}
                                                    
													$content.="</tbody></table>
													</p>
                                                </div>
												<p>Đơn hàng dự kiến sẽ được giao trong vòng từ 3-5 ngày làm việc. Chúng tôi sẽ gửi mail cho bạn khi đã phân công nhân viên giao hàng.</p>
												<p>Để xem chi tiết đơn hàng. Bạn vui lòng đăng nhập và vào mục thông tin các nhân của bạn.</p><a href='http://localhost/WEB_THUC_TAP/user.php'>Kiểm tra ngay.</a> <p>Cảm ơn bạn rất nhiều.</p>";
		
		
			 
	 			include_once("admin/smtpgmail/class.phpmailer.php");
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

				$mail->Subject="XÁC NHẬN ĐƠN HÀNG";
				$mail->MsgHTML($content);
				$mail->AddAddress($_SESSION["info_customer_order"]["txt_email_cus"], "Content feedback"); // Mail người nhận
			
					if(!$mail->Send())
					{
						echo "<p class='text-center'>"."Lỗi".$mail->ErrorInfo."</p>";
						
					}
					else
					{
						
						
							echo "<p class='text-center text-info'>"."Đã gửi thông báo</p>";
						
						
					}
				
			  
															
													
			unset($_SESSION["cart"]);		
			$_SESSION["number_buy"]=0;	
			unset($_SESSION["protect"]);				
			}
			
		?>
		
        
        
        
        
   