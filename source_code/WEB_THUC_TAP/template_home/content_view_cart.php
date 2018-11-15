<?php
	include_once("../admin/database/select_data.php");
	$data_select=new select_data();
	if(!$_SESSION["cart"]||$_SESSION["cart"]==NULL)
	{
		echo "<h3 class='text-info text-center'>Hiện tại bạn chưa có sản phẩm nào trong giỏ hàng</h3>";
		echo '<img src="admin/assert/pattern/cart-empty.png" class="img-responsive" alt="Image" width=100%">';
	}
	else if($_SESSION["number_buy"]>0)
	{
?>
<div id="list_product_find">
</div>
	<div id="view_cart">
				 			<!- KET THUC MENU NEW-!>
					 			<div class="row">
					 				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 ">
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_catalog_detail" >
						 					<p class="text-info">Thông tin giỏ hàng</p>
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
							 							<th colspan="2"></th>
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
							 						
							 							<td  width="100px"><input type="number" name="update_number<?php echo $value["id_product"]?>"  id="update_number<?php echo $value["id_product"]?>" class="form-control" value="<?php echo $value["number"] ?>" required pattern="" title=""></td>
							 							<td><?php echo number_format($value["price"]) ?> VNĐ</td>
							 							<td><?php echo number_format($value["price"]*$value["number"])?>VNĐ</td>
                                                        <?php
                                                        	$info_product_in_cart=$data_select->query_one_product($value["id_product"]);
														?>
							 							<td><a href="javascript:void(0)" onClick="return upda(<?php echo $value["id_product"]?>,<?php echo $info_product_in_cart->quantity_inventory;?>)"><i class="fa fa-recycle" aria-hidden="true"></i></a></td>
                                                        
							 							<td><a href="javascript:void(0)" onClick="deleta_product_cart(<?php echo $value["id_product"];?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
							 							
							 						</tr>
                                                    <?php
													$number+=$value["number"];
													$total_money+=($value["price"]*$value["number"]);
													}
													
													?>
							 						<tr>
                                                    	<td colspan="7"><p class="text-center">Xóa toàn bộ giỏ hàng hiện tại của bạn<a onclick="delete_all_shopping()">Tại đây</a></p></td>
                                                    </tr>
							 					</tbody>
							 				</table>
						 					
						 				</div>
						 				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 					<p class="text-center">Thông tin chi tiết giỏ hàng của bạn</p>
						 					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3
						 					 col-md-offset-3 col-lg-offset-3 info_shopping_cart_left">
						 						<p>Số lượng loại sản phẩm: <?php echo count($_SESSION['cart'])?></p>
						 						<p>Tổng số sản phẩm: 
                                                <?php
                                                	echo $number;
												?>
                                                </p>
						 						<p>Tổng tiền: <?php
                                                	echo number_format($total_money);
												?> VNĐ</p>
						 						<p>Giảm giá: 0</p>
						 						<p>Tổng thanh toán: <?php
                                                	echo number_format($total_money);
												?> VNĐ</p>
												<?php $_SESSION["info_order"]=array("number_product"=>count($_SESSION['cart']),"total_money"=>$total_money)?>
						 					</div>
						 					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3
						 					 info_shopping_cart_right">
						 						<a href="index.php"><p><i class="fa fa-arrow-circle-right fa-2x text-success" aria-hidden="true"></i> TIẾP TỤC MUA HÀNG</p></a>
                                        
						 						<a href="buy.php"><p><i class="fa fa-check fa-2x text-info" aria-hidden="true"></i> XÁC NHẬN </p></a>
						 					</div>
						 				</div>
						 				
						 				
					 					
					 				</div>
					 				<div class="hidden-xs col-md-2 col-lg-2 top_new_product">
					 					

									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 top_new_product">
					 				
					 					 <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-12 col-lg-12 ">
			                                       	 <img src="Admin/Assert/pattern/banner_view_cart1.png" class="img-responsive" alt="Image">

			                                      	 </div>

									</div>

				 				</div>
				 			</div>		
				 			<!- KET THUC DETAIL SAN PHAM-!>
				 			
				 			<!--  sap xep san pham-->
			 				
		<?php
	}
		?>		 			
					 			
		</div>