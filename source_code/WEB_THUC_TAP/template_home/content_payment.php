<?php
	if(isset($_POST['btn_buy']))
	{
		$_SESSION["info_customer_order"]=array("txt_email_cus"=>$_POST['txt_email_cus'],"txt_phone_cus"=>$_POST['txt_phone_cus'],"txt_address_cus"=>$_POST['txt_address_cus'],"txt_full_name_cus"=>$_POST['txt_full_name_cus']);
		$_SESSION["protect"]=$id_protect=rand(1111111,999999);
		
	}
	//echo $_SESSION["protect"];
?>	
<div id="list_product_find">
</div>
			<!- KET THUC MENU NEW-!>
		<div id="login_content">	
			<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 content_buy_left">
			 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
			 					<p class="text-info">Thông tin đơn hàng</p>
			 				</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th colspan="2"><h3 class="text-center">Vui lòng chọn hình thức thanh toán của bạn </h3></th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<td colspan="2"><p>Chúng tôi cung cấp cho bạn hai giải pháp thanh toán.</p>
								<p> Với hình thức thanh toán truyền thống. Bạn sẽ xác nhận đơn hàng, nhân viên
								của chúng tôi sẽ thực hiện việc chuyển giao hàng cho bạn. Khi nhận được hàng, bạn vui
								lòng thanh toán cho nhân viên giao hàng  của chúng tôi</p>
								</td>
								</tr>
								<tr>
                                	<form action="publish.php" method="post">
									<td>Bạn chọn thanh toán truyền thống. Nhận hàng vào giao tiền cho nhân viên</td>
									<td><button type="submit" name="btn_house_pay" class="btn btn-danger text-center">XÁC NHẬN ĐẶT HÀNG</button></td></form>
								</tr>
								<td colspan="2"><p>Giải pháp thanh toán trực tuyến,  nhanh gọn, tiện lợi.</p>
								<p>Chúng tôi đã tích hợp kênh thanh toán ngân lượng. Bạn chỉ cần thực hiện theo 
								hỗ trợ từ nhà cung cấp dịch vụ. Sau khi nhân được thông tin thanh toán từ bạn. Chúng tôi
								sẽ tiến hành giao hàng theo đúng quy định.</p>
								</td>
								<tr>
									<td>Thanh toán trực tuyến</td>
									<td>
										 	<form method="post" action="https://www.nganluong.vn/advance_payment.php">
<input type=hidden name=receiver value="nguyenanhhoang.qb.72@gmail.com" /><input type=hidden name=product value="<?php echo 	$_SESSION["protect"]?>" />
<input type=hidden name=price value="<?php echo $_SESSION["total_money"];?>" />
<input type=hidden name=return_url value="http://localhost/WEB_THUC_TAP/publish.php?active_payment=3&&id_protect=<?php echo $_SESSION["protect"];?>" />
<input type=hidden name=comments value="<?php echo "Khách hàng:".$_SESSION["info_customer_order"]["txt_full_name_cus"]."Địa chỉ:".$_SESSION["info_customer_order"]["txt_address_cus"];?>" />
<input type=hidden name=cancel_url value="http://localhost/WEB_THUC_TAP/payment.php" />

<input type=image src="https://www.nganluong.vn/css/newhome/img/button/pay-sm.png" />
</form>
									</td>
								</tr>
								<tr class="bg-info">
								 <td colspan="2" style="text-align:center;"><p>Hoàn thành đơn hàng bằng việc lựa chọn hình thức thanh toán bên trên</p></td>
								</tr>
							</tbody>
						</table>
								
                        </div>
							
			
				<div class="col-md-4 col-lg-4 top_new_product">
					

			
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top_new_product" style="margin-top:0px;">
						
							<div class="panel panel-danger">
								<div class="panel-heading">
									<h3 class="panel-title">Thông tin đơn hàng</h3>
								</div>
								<div class="panel-body">
								<p>
								Thông tin khách đặt hàng: <?php echo $_SESSION["info_customer_order"]["txt_full_name_cus"];?>
								</p>
								<p>
								Số điện thoại: <?php echo $_SESSION["info_customer_order"]["txt_phone_cus"];?>
								</p>
								<p>
								Email: <?php echo $_SESSION["info_customer_order"]["txt_email_cus"];?>
								</p>
								<p>
								Địa chỉ: <?php echo $_SESSION["info_customer_order"]["txt_address_cus"];?>
								</p>
									<?php 
									$total_money=0;
										foreach($_SESSION["cart"] as $key=>$value)
										{
							
									$total_money+=($value["price"]*$value["number"]);		
										}
										
									?>
									<p style="background-color:#CCC;"><span class="text-warning">Tổng tiền:</span><?php echo number_format($total_money);?> VNĐ</p>
								</div>
							</div>

					</div>

			</div>
		</div>		
		<!- KET THUC DETAIL SAN PHAM-!>
	</div>	
		
		<!--  sap xep san pham-->
		
	
			