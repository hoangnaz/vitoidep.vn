<?php

	include_once("admin/database/select_data.php");
	$us_select=new select_data();

	//print_r($lst_custom_pagination);
?>
    <div id="list_product_find">
    </div>
			<!- KET THUC MENU NEW-!>
		<div id="login_content">	

					 			<div class="row">
					 			<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 ">
					 			<?php 
										if($_SESSION["info_customer"]["id_customer"]=="")
									{
								?>
									<h3 class="text-danger text-center">Rất tiếc chúng tôi không hiển thị thông tin cá nhân của bạn vì bạn
									chưa đăng nhập!<a href="login.php" class="text-center"> Đăng nhập ngay?
									</a>
									</h3>
									
							   <?php
                                    }
                                    else
                                    {
											$lst_order=$us_select->list_order_by_customer($_SESSION["info_customer"]["id_customer"]);
											
                                ?>
	                                               		    
					       		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
						 					<p class="text-info">Thông tin tài khoản của bạn</p>
						 				</div>
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info_detail_product">
							 				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 info_account">
							 					<h3 class="text-center"> THÔNG TIN CÁ NHÂN</h3>
                                                <div class="col-xs-12 col-sm-12  col-lg-6 col-lg-offset-3">
							 					<p ><i class="fa fa-2x fa-address-book-o" aria-hidden="true"></i>   Họ tên: <?php echo $_SESSION["info_customer"]["fullname"]?></p>
							 					<p ><i class="fa fa-2x fa-envelope-o" aria-hidden="true"> </i>   Email:  <?php echo $_SESSION["info_customer"]["email"]?></p>
							 					<p><i class="fa fa-3x fa-mobile" aria-hidden="true"></i>    Số điện thoại:0 <?php echo $_SESSION["info_customer"]["phone_number"]?></p>
							 					<p ><i class="fa fa-2x fa-map-marker" aria-hidden="true"></i>    Địa chỉ giao hàng mặc định: <?php echo $_SESSION["info_customer"]["address"]?></p>
					 							<a  data-toggle="modal" href='#modal-id' class="text-success">
					 								<p ><i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i>  CẬP NHẬT TÀI KHOẢN</p>
					 							</a>
							 						<div class="modal fade" id="modal-id" width="50%">
							 							<div class="modal-dialog" >
							 								<div class="modal-content">
							 									<div class="modal-header">
							 										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							 										<h4 class="modal-title">Cập nhật thông tin cá nhân của bạn</h4>
							 									</div>
							 									<div class="modal-body">
                                                                
                                                                
                                                                
							 									<form action="manipulation/pr_update_user.php" method="POST">
							 										<div class="form-group">
		 															<label for="up_username">
		 																<p >
		 															<i class="fa fa-user-o fa-2x" aria-hidden="true"></i> Họ tên
		 																</p></label>
		 																<input type="text" class="form-control" id="up_username" name="up_username" placeholder="nhập họ tên" value="<?php echo $_SESSION["info_customer"]["fullname"]?>"   pattern="[À-ža-zA-Z\s].{0,}" title="Tên không bắt đầu bằng số">
		 															</div>
		 															<div class="form-group">
		 																<label for="up_email">
		 																<p >
		 																	<i class="fa fa-key fa-2x" aria-hidden="true"></i> Email
		 																</p></label>
	 																			<input type="email" class="form-control" id="up_email" name="up_email" placeholder="nhập email"  value="<?php echo $_SESSION["info_customer"]["email"]?>">
	 																	</div>
		 															<div class="form-group">
		 															<label for="up_phone">
		 																<p >
		 															<i class="fa fa-mobile fa-2x" aria-hidden="true"></i> Số điện thoaị
		 																</p></label>
                                                                        <input type="text" class="form-control"
                                                                         id="phone" name="upda_phone" placeholder="nhập số điện thoại"  value="<?php echo $_SESSION["info_customer"]["phone_number"]?>" pattern="[0-9]{10,11}" title="Số điện thoại phải là số. Độ dài số điện thoại từ 10-11 ">
		 																
		 															</div>
		 															
                                                                    
		 															<label for="up_address">
		 																<p >
		 															<i class="fa fa-map-marker fa-2x" aria-hidden="true"></i> Địa chỉ giao hàng mặc định
		 																</p></label>
                                                                        
                                                                        
                                                                        
		 																<textarea  class="form-control" id="up_address" name="up_address"  placeholder="nhập địa chỉ "><?php echo $_SESSION["info_customer"]["address"]?></textarea>
		 															</div>
		 														
                                                                
                                                                
                                                                
							 									<div class="modal-footer">
	 																	<button type="submit" name="update_user" class="btn btn-primary">Lưu cập nhật</button>
							 									</div>
							 									</form>
                                                                
                                                                
                                                                
                                                                
							 								</div>
							 							</div>
							 						</div>
							 					
                                                <?php
                                            	if(sizeof($lst_order)==0)
												{
													echo "<p class='text-center'>Xin lỗi bạn chưa thực hiện đơn hàng nào</p>";
												}
												?>
                                                </div>
							 				</div>
                                            <?php
                                            	if(sizeof($lst_order)>0)
												{
												
											?>
							 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							 					<h3>Đơn hàng gần đây</h3>
							 				<table class="table table-bordered">
							 					<thead id="title_table_view_cart">
							 						<tr>
							 							<th>Mã đơn hàng đã đặt</th>
							 							<th>Ngày đặt hàng</th>
							 							<th>Sản phẩm</th>
							 							<th>Tổng tiền</th>
							 							<th>Tình trạng</th>
							 							
							 						</tr>
							 					</thead>
							 					<tbody>
                                                	<?php foreach($lst_order as $lod)
														{
															
													?>
							 						<tr>
                                                    	<td><?php echo $lod->id_order;?></td>
							 							<td><?php echo date("d-m-Y",strtotime($lod->date_order));?></td>
							 							
							 							<td>
                                                        <?php
                                                        	$lst_pro_order=$us_select->list_product_in_order($lod->id_order);
															
															foreach($lst_pro_order as $lpo)
															{
														?>
							 								<p><?php echo $lpo->name_product." <span class='text-danger'> Số lượng: ".$lpo->pro_quantity."</span>";?></p>
							 							<?php
															}
														?>	
							 							</td>
							 							<td><?php echo number_format($lod->total_money_order);?> VNĐ</td>
							 							<td>
							 							<?php
														if($lod->status_order==1)
														{
														echo "Đặt hàng, chưa thanh toán";
														}
															else if($lod->status_order==2)
														{
														echo "Thanh toán và đang giao hàng";
														}
															else if($lod->status_order==3)
														{
														echo "Nhận hàng và thanh toán thành công";
														}
 														 ?>
							 							</td>
							 						</tr>
                                                    <?php
														}
													?>
						 							
							 					</tbody>
							 				</table>
							 				</div>
						 					<?php
												}
											?>
						 				</div>
						 				
								<?php
                                }
                                ?>
					 				
						 				
						 				
						 				
					 					
					 				</div>
					 				<div class=" col-md-2 col-lg-2 top_new_product hidden-xs">
					 					
					 				  <img src="admin/assert/sale_support/support1.png" class="img-responsive" alt="Image">    
			
										 <img src="admin/assert/sale_support/support.png" class="img-responsive" alt="Image">
                                        
				 				</div>
				 			</div>		
				 			<!- KET THUC DETAIL SAN PHAM-!>
				 	</div>		
				 			<!--  sap xep san pham-->
			 				
				 			
					 			
		 			
		 	