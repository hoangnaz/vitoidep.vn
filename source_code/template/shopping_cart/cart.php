
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
                    <div class="table-responsive">
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
                                        <th class="" colspan="2">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                $_SESSION['total_price']=0;
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
                                            <img width="80" src="images/product/<?php echo $value['info']->image_product;?>" alt="" />
                                            
                                        </div>
                                    </td>
                                    <td class=""><?php echo number_format((1-($value['info']->point_promotion/100))* $value['info']->price_product);?>
                                    </td>
                                    <td class="">
                                        <?php echo number_format($value['number']);?>
                                    </td>
                                    <td class="">
                                        <a class="product-remove text-info shopping-cart-add-delete"  onclick="shopping_cart(<?php echo $value['info']->id_product;?>,0,1)"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                    </td>
                                    <td class="">
                                        <a class="product-remove shopping-cart-add-delete" ><i class="fa fa-trash" aria-hidden="true" onclick="delete_product_cart(<?php echo $value['info']->id_product;?>)"></i></a>
                                    </td>
                                </tr>
                        <?php
                            $_SESSION['total_price']+=((1-($value['info']->point_promotion/100))* $value['info']->price_product* $value['number']);
                            }
                         ?> 
                            </tbody>
                        </table>
                    </div>    
                    <hr>
                </div>			
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <a href="index.php" class="btn  btn-shopping  pull-left"><i class="fa fa-arrow-left" aria-hidden="true"></i>Thêm sản phẩm</a>
                </div>
            </div>
            <?php
                }else{
            ?>
            <h3 class="text-center text-waring">Hiện tại bạn chưa có sản phẩm trong giỏ</h3>
            <?php
                }
            ?> 	
        </div>
    </div>