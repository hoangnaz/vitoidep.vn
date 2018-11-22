  <!-- Modal -->
  <div class="modal fade" id="btn_confirm_all" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-body">
               
					<div class="product-checkout-details">
							<div class="block">
							   <h4 class="widget-title text-uppercase text-center">Thông tin đơn hàng của bạn</h4>
							   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<h5 class="media-heading">Họ tên: <span id="popup_order_name"></span></h5>
									<h5 class="media-heading">Số điện thoại: <span  id="popup_order_phone"></span></h5>
									<h5 class="media-heading">Email: <span  id="popup_order_email"></span></h5>
									<h5 class="media-heading"> Địa chỉ: <span  id="popup_order_address"></span></h5>
									<h5 class="media-heading"> Hình thức thanh toán : <span  id="popup_order_delivery"></span></h5>
					 			</div>
								 <div class="table-responsive"> 
										<table class="table table-hover">
											<thead>
												<tr>
													<th>STT</th>
													<th>Tên sản phẩm</th>
													<th>Số lượng</th>
													<th>Đơn giá</th>
													<th>Thành tiền</th>
												</tr>
											</thead>
											<tbody>
												<tr>
												<?php
														$order=0;
														foreach ($_SESSION["product_cart"] as $key => $value) {
															$order++;
													?>
													<td>
														<?php echo $order;?>
													</td>
													<td>
														<?php echo $value['info']->name_product;?>
													</td>
													<td>
														<?php echo $value['number'];?>
													</td>
													<td>
														<?php 
															$price = (1-($value['info']->point_promotion/100))* $value['info']->price_product;
															echo number_format( $price);
														?>
													</td>
													<td>
														<?php 
															$totalMoney= $price*$value['number'];
															echo number_format( $totalMoney).'VNĐ';
														?>
													</td>
												
												</tr>
												<?php

														}
												?>	 
											</tbody>
										</table>
									</div>						
							   </div>
							   <div class="discount-code">
								  <p>Mã giảm giá: <span>Không sử dụng</span></p>
							   </div>
							   <ul class="summary-prices">
								  <li>
									 <span>Số tiền phải trả:</span>
									 <span class="price"><?php echo number_format($_SESSION['total_price']);?>VNĐ</span>
								  </li>
					
								  <li class="text-center">
										<button  class="btn btn-main" id="confirm_complete_order">Hoàn tất</button>
								  </li>
							   </ul>
							  
							</div>
							
                 
               
            </div>
         </div>
      </div>
   </div>
  <!-- end modal -->