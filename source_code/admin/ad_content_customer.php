<?php
	$lst_custom_pagination=$ad_select->query_list_customer();
?>



 <div class="col-lg-12">


						<h4 class="text-center text-danger text-uppercase">Danh sách khách hàng</h4>
                        <div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><p class="text-center">Mã khách hàng</p></th>
                                        <th><p class="text-center">Họ và tên</p></th>
                                        <th><p class="text-center">Email</p></th>
                                        <th><p class="text-center">Số điện thoai</p></th>
										<th><p class="text-center">Điểm thưởng</p></th>
                                  		<th></th>
                                    </tr>
                                </thead>
                                <tbody>
                               		<?php 
										foreach($lst_custom_pagination as $lst_cus)
										{
											if($lst_cus->email!='')
											{
									?>
                                    <tr>
                                        <td class="text-center"><?php echo $lst_cus->id_customer;?></td>
                                        <td><?php echo $lst_cus->fullname;?></td>
                                        <td><?php echo $lst_cus->email;?></td>
                                        <td class="text-center">0<?php echo $lst_cus->phone_number;?></td>
										<th><p class="text-center"><?php echo $lst_cus->point;?></p></th>
									   <td>
                                        <a  data-toggle="modal" href='#cus<?php echo $lst_cus->id_customer;?>' > <i class="fa fa-info-circle text-info" aria-hidden="true"> Thông tin khách hàng</i></a>
                                            <div class="modal fade" id="cus<?php echo $lst_cus->id_customer;?>" tabindex="-1">
                                                <div class="modal-dialog" style="width:90%">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-body">
                                                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info_detail_product">
							 				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 info_account">
							 					<h3 class="text-center"> Thông tin khách hàng <?php echo $lst_cus->fullname;?></h3>
                                                <div class="col-xs-12 col-sm-12  col-lg-6 col-lg-offset-3">
							 					<p ><i class="fa fa-2x fa-address-book-o" aria-hidden="true"></i>   Họ tên: <?php  echo $lst_cus->fullname;?></p>
							 					<p ><i class="fa fa-2x fa-envelope-o" aria-hidden="true"> </i>   Email:  <?php echo $lst_cus->email;?></p>
							 					<p><i class="fa fa-3x fa-mobile" aria-hidden="true"></i>    Số điện thoại: <?php echo $lst_cus->phone_number?></p>
							 					<p ><i class="fa fa-2x fa-map-marker" aria-hidden="true"></i>    Địa chỉ giao hàng mặc định: <?php echo $lst_cus->address;?></p>
                                                 <?php
                                                
												
												if(sizeof($lst_order)==0)
												{
													echo "<p class='text-center'>Khách hàng chưa có đơn đặt hàng</p>";
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
							 				<table class="table table-bordered" id="table_id">
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
							 							<td><?php echo $lod->date_order;?></td>
							 							
							 							<td>
                                                        <?php
                                                        	$lst_pro_order=$ad_select->list_product_in_order($lod->id_order);
															
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
                                                           
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </td>
                                      
                                    </tr>
                                    <?php
											}
										}
									?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                        <div id="pagination_page">
							<?php
                            
                                echo $pagination;
                            ?>
                        </div>
                    </div>