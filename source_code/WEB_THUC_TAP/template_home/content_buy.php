


<div id="list_product_find">
</div>
			<!- KET THUC MENU NEW-!>
		<div id="login_content">	
			<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 content_buy_left">
			 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
			 					<p class="text-info">THÔNG TIN MUA HÀNG</p>
			 				</div>
	
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="result_login">
                                	<h3 class="text-center">Vui lòng cung cấp thông tin </h3>	
				 				</div>
				 				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 form_info_input">
				 					<form action="payment.php" method="POST" role="form">
				 					
				 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
				 						<div class="form-group">
				 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				 								<label for="full_name">Họ và tên:</label>
				 							</div>
				 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				 						
				 									<input type="text" name="txt_full_name_cus" class="form-control" id="full_name" value="<?php 
										if($_SESSION["info_customer"]["id_customer"]!="")
									{
										echo $_SESSION["info_customer"]["fullname"];
									}
								?>" required  pattern="[À-ža-zA-Z\s].{0,}" title="Tên không bắt đầu bằng số">
				 							</div>
				 						
				 						</div>
				 					
				 					</div>
				 				
				 					
				 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				 						<div class="form-group">
				 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				 								<label for="email">Email:</label>
				 							</div>
				 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				 						
				 									<input type="email" name="txt_email_cus" class="form-control" id="email"   value="<?php 
										if($_SESSION["info_customer"]["id_customer"]!="")
									{
										echo $_SESSION["info_customer"]["email"];
									}
								?>" required title="Vui lòng nhập email đúng định dạng">
				 							</div>
				 						
				 						</div>
				 					
				 					</div>
		 							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				 						<div class="form-group">
				 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				 								<label for="phone">Số điện thoại:</label>
				 							</div>
				 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				 						
				 									<input type="number" name="txt_phone_cus" class="form-control" id="phone"  value="0<?php 
										if($_SESSION["info_customer"]["id_customer"]!="")
									{
										echo $_SESSION["info_customer"]["phone_number"];
									}
								?>" required pattern="[0-9]{10,11}" title="Số điện thoại phải là số. Độ dài số điện thoại từ 10-11 ">
				 							</div>
				 						
				 						</div>
				 					
				 					</div>
				 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				 						<div class="form-group">
				 							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				 								<label for="address">Địa chỉ giao hàng: Đây là địa chỉ nhận hàng. 
				 								Bạn vui lòng nhập chính xác</label>
				 							</div>
				 							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				 						
				 									<textarea class="form-control" name="txt_address_cus" id="address" rows="10" required="required" > <?php 
										if($_SESSION["info_customer"]["id_customer"]!="")
									{
										echo $_SESSION["info_customer"]["address"];
									}
								?></textarea> 
				 							</div>
				 						
				 						</div>
				 					
				 					</div>	

				 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:10px;">
                                 
				 						<div class="form-group">
				 							 
				 							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="text-align:center;">
				 								<button type="submit" name="btn_buy" onclick="return check_info_buy()" class="btn btn-danger text-center">TIẾP TỤC</button>
				 							</div>
                                          
				 							
				 						
				 						</div>
                                        	</form>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="text-align:center;">
				 								<a href="view_cart.php"><i class="fa fa-2x fa-undo" aria-hidden="true"> </i> QUAY LẠI GIỎ HÀNG</button></a>
				 							</div>
				 					
				 					</div>	
				 						
				 					
				 				


				 				</div>
                        </div>
							
			
				<div class="col-md-4 col-lg-4 top_new_product">
					

			
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top_new_product" style="margin-top:0px;">
						
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title">VUI LÒNG KIỂM TRA THÔNG TIN SẢN PHẨM</h3>
								</div>
								<div class="panel-body">
									<?php 
									$total_money=0;
										foreach($_SESSION["cart"] as $key=>$value)
										{
									?>
									<p><b>Tên sản phẩm:</b><?php echo $value["name_product"];?></p>
									<p><b>Số lượng:</b><?php echo $value["number"];?>
									<b style="padding-left:20px;">Số tiền:</b><?php echo number_format($value["price"]*$value["number"])?>VNĐ</p>
									<hr>
									
									<?php
									$total_money+=($value["price"]*$value["number"]);	
									$_SESSION["total_money"]=$total_money;
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
		
		
			