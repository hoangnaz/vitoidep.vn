   <?php
      if($_SESSION["product_cart"] && count($_SESSION["product_cart"])>0 ){
   ?>
      <div class="col-md-4" style="margin-bottom:20px;">
         <div class="product-checkout-details">
            <div class="block">
               <h4 class="widget-title text-center">Đơn hàng của bạn</h4>
               
               <!-- process show list product in shopping cart -->
               <!-- PHP process PHP show list shopping cart -->
               <?php
                  $_SESSION['total_price']=0;
                  foreach ($_SESSION["product_cart"] as $key => $value) {
               ?>
               <!-- PHP End process -->
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<p class="media-heading"><a href="product-single"><?php echo $value['info']->name_product;?></a></p>
										<p class="price"><span>Số lượng mua:</span><?php echo $value['number'];?></p>
										<span class="remove" ><span>Thành tiền: 
                                 <?php 
                                    $price = (1-($value['info']->point_promotion/100))* $value['info']->price_product;
                                    $totalMoney= $price*$value['number'];
                                    echo number_format( $totalMoney);
                                 ?>
                              VNĐ</span>
                              </span>		 
						</div>
              
               <?php
                  $_SESSION['total_price']+=$totalMoney;
                  }
               ?>
                  <div class="discount-code">
                     <p>Bạn đã sử dụng mã giảm giá : <span class="text-center text-success">Không sử dụng</span></p>

                  </div>
                  <ul class="summary-prices">
                     <li>
                        <span>Số tiền phải trả:</span>
                        <span class="price text-warning"><?php echo number_format( $_SESSION['total_price']);?>VNĐ</span>
                     </li>
                     <li>
                        <span>Số tiền vận chuyển:</span>
                        <span>Miễn phí</span>
                     </li>
                     <li class="text-center">   
                           <a onclick="return confirm_info_order()" class="btn btn-main pull-left btn_confirm_all complete_order"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Hoàn tất mua hàng</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   <?php
      }
      else{
   ?>
         <p class="text-center">Bạn chưa có sản phẩm nào trong giỏ để thực hiện thanh toán</p>
   <?php 
      }
   ?> 
   </div>
</div>

 