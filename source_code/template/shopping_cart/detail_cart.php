	<div style="clear:both;" class="hidden-lg hidden-md"></div>
		<div class="col-md-4 ">
			<?php
                       
				if($_SESSION["product_cart"] && count($_SESSION["product_cart"])>0 ){
			?>
					 <p class="text-center text-uppercase">Thông tin giỏ hàng của bạn</p>
							<form action="">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
										<p><b>Số lượng:</b> <?php echo count($_SESSION["product_cart"]);?> sản phẩm</p>
									</div>
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<p><?php echo number_format($_SESSION['total_price']);?> VNĐ</p>
									</div>
									<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
										<p><b>	Chi phí giao hàng :</b></p>
									</div>
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<p>Không mất phí </p>
									</div>
									<hr></hr>
									<form action="" method="POST" role="form">
										<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
											<!-- <input type="text" name="" placeholder="Mã giảm giá" id="input" class="form-control" value="" required="required" pattern="" title=""> -->
										</div>
										
										<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										
											<!-- <a class="btn btn-buynow">Áp dụng</a> -->
										</div>
									</form>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<?php
												if($_SESSION['customer']){
												?>
													<p><i class="fa fa-location-arrow position" aria-hidden="true"></i>Bạn có muốn thay đổi địa điểm giao hàng mặc định?</p>
													<a  data-toggle="modal" data-target="#edit_position"  ><p class="text-info"><?php echo $_SESSION['customer']->address; ?><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </p></a>
												<?php
												}
												else{
													?>
													Bạn hãy <a href=""  data-toggle="modal" data-target="#sign_in"><p><u>đăng nhập</u><p></a> để cập nhật địa
													chỉ giao hàng mặc định. Và giúp chúng tôi phục vụ bạn tốt hơn.
													<?php
												}
										?>
										
									</div>
									<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
										<p>Tổng chi phí</p>
									</div>
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
										<p><?php echo number_format($_SESSION['total_price']);?> VNĐ</p>
									</div>
									<div class="col-xs-12 col-sm-12" >
										<p>Đơn giá trên đã có đầy đủ mọi thuế phí</p>
										<hr>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<a href="check_out" class="btn btn-transparent pull-left text-danger"><i class="fa fa-arrow-right" aria-hidden="true"></i>Xác nhận đơn hàng</a>
									</div>
								</div>
							</form>
						<?php
							}
						?>	
						</div>
					</div>
     			 </div>
  		  </div>
</section>
