<?php
	
	$lst_order_status_one=$ad_select->list_order_follow_status(1);
	$count=count($lst_order_status_one);
	$limit=10;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$list_order_follow_status=$ad_select->list_order_follow_status_page(1,$posision,$limit);
	$lst_order_status=$ad_select->list_status_order();
	
   $lst_staff=$ad_select->query_list_staff();
  //print_r($list_order_follow_status);

	//print_r($lst_custom_pagination);
?>
<!-- /.row -->
                 <div class="row">
               		
                     <div class="col-lg-10 col-lg-offset-1">
                      <select name="list_status_order" id="inputList_status_order" class="form-control" onchange="order_list(this.value)">
                         <option value="">-- Vui lòng chọn tình trạng đơn  hàng muốn xem nhanh hơn --</option>
                        <?php
                        	foreach($lst_order_status as $lt_or_status)
							{
								if($lt_or_status->id_status_order!=4)
								{
						?>
                        <option value="<?php echo  $lt_or_status->id_status_order?>">-- <?php echo  $lt_or_status->status_name?> --</option>
                         
                          <?php
								}
							}
						  ?>
                        </select>
                       
                    </div>
                   
                    <div class="col-lg-12">
                        <h4 class="text-center">DANH SÁCH ĐƠN HÀNG CHƯA THANH TOÁN VÀ CHƯA GIAO HÀNG</h4>
                        <div class="table-responsive">
                              <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="150px"><p class="text-center">Mã đơn hàng</p></th>
                                        <th width="200px"><p class="text-center">Khách hàng nhận</p></th>
                                        
                                        <th><p class="text-center">Địa chỉ</p></th>
                                        <th><p class="text-center">Ngày đặt hàng</p></th>
                                        <th><p class="text-center">Nhân viên phụ trách </th>
                                        <th><p class="text-center">Tổng tiền</p></th>
                                      
                                         <th colspan="5"><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach(	$list_order_follow_status as $lo_status)
                  								{
                  									?>
                                    <tr>
                                        <td><?php echo $lo_status->id_order; ?></td>
                                          <td><?php echo $lo_status->reciever; ?></td>
                                          <td><?php echo $lo_status->address_recieve; ?></td>
                                           <td><?php echo date("d-m-Y",strtotime($lo_status->date_order)); ?></td>
                                          <td><?php if($lo_status->staff_in_charge==1)
										  			{
														echo "Chưa phân công nhân viên";
													}
													else
													{
														echo $lo_status->fullname;
													}
										   ?></td>
                                         
                                          <td><?php echo number_format($lo_status->total_money_order).'VNĐ'; ?></td>
                                        <td>
                                           <a  data-toggle="modal" href='#<?php echo $lo_status->id_order; ?>'><i class="fa fa-info-circle text-info" aria-hidden="true"></i></a>
                                            <div class="modal fade" id="<?php echo $lo_status->id_order; ?>" tabindex="-1">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title text-center text-uppercase">Đơn hàng <?php echo $lo_status->id_order; ?></h4>
                                                  </div>
                                                  <div class="modal-body">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info_detail_product">
                                                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 info_account">
                                                            
                                                            <div class="col-xs-12 col-sm-12  col-lg-6 col-lg-offset-3">
                                                            <p ><i class="fa fa-2x fa-address-book-o" aria-hidden="true"></i>   Họ tên người nhận: <?php  echo $lo_status->reciever;?></p>
                                                            <p ><i class="fa fa-2x fa-envelope-o" aria-hidden="true"> </i>   Email:  <?php echo $lo_status->email;?></p>
                                                            <p><i class="fa fa-3x fa-mobile" aria-hidden="true"></i>    Số điện thoại: <?php echo $lo_status->phone_nummber?></p>
                                                            <p ><i class="fa fa-2x fa-map-marker" aria-hidden="true"></i>    Địa chỉ giao hàng mặc định: <?php echo $lo_status->address_recieve;?></p>
                                                         <p ><i class="fa fa-2x fa-money" aria-hidden="true"></i>   Tình trạng: Chưa giao hàng, chưa thanh toán</p>
                                                          </div>
                                                    </div>
                                                  </div>
                                                  <?php
                                                  $info_one_order=$ad_select->list_product_in_order($lo_status->id_order);
                                                

                                                 ?>
                                                 <table class="table table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th>Mã sản phẩm</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                        
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ( $info_one_order as $lst_one_order)
                                                     { 
                                                     ?>
                                                       <tr>
                                                        <td><?php echo $lst_one_order->id_product;?></td>
                                                        <td><?php echo $lst_one_order->name_product;?></td>
                                                        <td><img src="../images/product/<?php echo $lst_one_order->image_product;?>" class="img-responsive" alt="Image" width="60px"></td>
                                                        <td><?php echo $lst_one_order->pro_quantity;?></td>
                                                        <td><?php echo number_format($lst_one_order->total_money_product_order)."VNĐ";?></td>
                                                      </tr>
                                                    <?php
                                                     }
                                                     ?>
                                                     <tr>
                                                     <td colspan="4"></td>
                                                     	<td colspan="1">Tổng giá trị đơn hàng:<?php echo number_format($lo_status->total_money_order).'VNĐ'; ?></td>
                                                     </tr>
                                                     
                                                    </tbody>
                                                  </table>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div> 

                                        </td>
                                      
                                         <?php if($lo_status->staff_in_charge==1)
										  			{
														?>
                                                       <td>
                                        <a  data-toggle="modal" href='#upda<?php echo $lo_status->id_order; ?>'> 	<i class="fa fa-pencil-square-o " aria-hidden="true"></i></a>
                                          <div class="modal fade" id="upda<?php echo $lo_status->id_order; ?>">
                                            <div class="modal-dialog" style="width:50%" >
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title text-center text-uppercase">Cập nhật đơn hàng <?php echo $lo_status->id_order; ?> </h4>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST" action="ad_manipulation/update_order.php?id_order=<?php echo $lo_status->id_order; ?>&id_staff=<?php echo $lo_status->staff_in_charge; ?>&or_status=1">
                                                 <div class="col-lg-12" style="margin-top:20px;">
                                                
                                             
                                                        <div class="col-lg-12">
                                                            <label for="role">Nhân viên quản lý đơn hàng:</label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                          
                                                                <select name="role_admin" id="input" class="form-control">
                                                               
                                                                <?php
                                                                  foreach($lst_staff as $lst_st)
                                                                    {
                                                                      if($lst_st->status==0 && $lst_st->staff_role==2)
                                                                      {
                                                                  ?>
                                                                           <option value="<?php echo $lst_st->id_staff;?>">-- <?php echo $lst_st->fullname;?> --</option>
                                                                            <?php
                                                                      }
                                                                    }
                                                                    ?>
                                                                    </select>
                                                            </div>
                                                                                                                                                                                                 
                                                </div>
                                                <div class="modal-footer">
                                                  
                                                  <button type="submit" name="upt_order" class="btn btn-primary">Cập nhật</button>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

													
                                                        </td>
													<?php
                                                    }
													else
													{
														?>
														
											
                                         
                                        <td>
                                        <a  data-toggle="modal" href='#upda_deliver<?php echo $lo_status->id_order; ?>'> <i class="fa fa-pencil-square-o text-danger" aria-hidden="true"></i></a>
                                          <div class="modal fade" id="upda_deliver<?php echo $lo_status->id_order; ?>">
                                            <div class="modal-dialog" style="width:50%" >
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  <h4 class="modal-title text-center text-uppercase">Cập nhật lại nhân viên phụ trách đơn hàng <?php echo $lo_status->id_order; ?> </h4>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST" action="ad_manipulation/update_order_deliver.php?id_order=<?php echo $lo_status->id_order; ?>&id_staff=<?php echo $lo_status->staff_in_charge; ?>&or_status=1">
                                                 <div class="col-lg-12" style="margin-top:20px;">
                                                
                                             
                                                        <div class="col-lg-12">
                                                            <label for="role">Nhân viên quản lý đơn hàng:</label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                          
                                                                <select name="role_admin" id="input" class="form-control">
                                                               
                                                                <?php
                                                                  foreach($lst_staff as $lst_st)
                                                                    {
                                                                      if($lst_st->status==0 && $lst_st->staff_role==2)
                                                                      {
                                                                  ?>
                                                                           <option value="<?php echo $lst_st->id_staff;?>">-- <?php echo $lst_st->fullname;?> --</option>
                                                                            <?php
                                                                      }
                                                                    }
                                                                    ?>
                                                                    </select>
                                                            </div>
                                                                                                                                                                                                 
                                                </div>
                                                <div class="modal-footer">
                                                  
                                                  <button type="submit" name="upt_order_deliver" class="btn btn-primary">Cập nhật</button>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                       </td>
                                       <?php
													}
									   ?>
                                        <td><a  onclick="confirm_succes_order('<?php echo $lo_status->id_order; ?>',<?php echo $lo_status->staff_in_charge ?>)"><i class="fa fa-check-square-o" aria-hidden="true"></i><a></td>
                                        <td><a  onclick="delete_order('<?php echo $lo_status->id_order; ?>',1)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                          <?php if($lo_status->staff_in_charge==1)
										  			{
														?>
													<td>
                                                    	<i class="fa fa-credit-card" aria-hidden="true">
													</i>
                                                    </td>
													<?php
                                                    }
													else
													{
														?>
														
										
                                        
                                        <td> <a  data-toggle="modal" href='a.php?id_order=<?php echo $lo_status->id_order; ?>' target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
                                          
                                        </td>
                                        <?php
													}
										?>
                                        
                                    </tr>
                                    <?php
                  									}
                  									?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">
                          <?php 
                          echo $pagination;
                          ?>
                        </div>
                    </div>
                   
                </div>