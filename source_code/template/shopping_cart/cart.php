
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Thanh toán</h1>
					
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
	<div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ">
          <div class="block">
            <div class="product-list">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php
                       
						if($_SESSION["product_cart"] && count($_SESSION["product_cart"])>0 ){
                            ?>
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="">Mã SP</th>
                                            <th class="">Tên sản phẩm</th>
                                            <th class="">Hình ảnh</th>
                                            <th class="">Đơn giá</th>
                                            <th class="">Số lượng</th>
                                            <th class="" colspan="2"></th>
                                        </tr>
                                    </thead>
                                                <tbody>
                            <?php
                            
                            $totalMoney=0;
							foreach ($_SESSION["product_cart"] as $key => $value) {
                            ?>
                                
                                                    <tr class="">
                                                            <td class="">
                                                                    <div class="product-info">
                                                                        <?php echo $value['info']->id_product;?>
                                                                    </div>
                                                            </td> 
                                                            <td class="">
                                                                    <div class="product-info">
                                                                    <?php echo $value['info']->name_product;?>
                                                                    </div>
                                                            </td> 
                                                        <td class="">
                                                            <div class="product-info">
                                                                <img width="80" src="images/shop/cart/cart-1.jpg" alt="" />
                                                               
                                                            </div>
                                                        </td>
        
                                                        <td class=""><?php echo(1-($value['info']->point_promotion/100))* $value['info']->price_product;?></td>
                                                        <td class="">
                                                        <?php echo $value['number'];?>
                                                            </td>
                                                            <td class="">
                                                                            <a class="product-remove" href="">+</a>
                                                                    </td>
                                                        <td class="">
                                                            <a class="product-remove" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </td>
                                                        
                                                    </tr>
                                                   <?php
                                    }
                    ?> 
                                            </tbody>
                                        </table>
                                    <hr>
                            </div>
									
                            <?php
                            }
                    ?> 					
								
									<div class="col-xs-12 col-sm-12 col-md-12">
										<a href="index.php" class="btn btn-main pull-left"><i class="fa fa-arrow-left" aria-hidden="true"></i>Thêm sản phẩm</a>
									</div>
							 </div>
              
            	</div>
          	</div>