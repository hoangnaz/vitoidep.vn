<?php
	
	$lst_order_status_one=$ad_select->list_order_follow_status(3);
	$count=count($lst_order_status_one);
	$limit=10;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$list_order_follow_status=$ad_select->list_order_follow_status_page(3,$posision,$limit);
	$lst_order_status=$ad_select->list_status_order();

	//print_r($lst_custom_pagination);
?>
<!-- /.row -->
                 <div class="row">
               		
                     <div class="col-lg-10 col-lg-offset-1">
                      <select name="list_status_order" id="inputList_status_order" class="form-control" onchange="order_list(this.value)">
                       <option value="">--  Vui lòng chọn tình trạng đơn  hàng muốn xem nhanh hơn  --</option>
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
                        <h4 class="text-center text-success">DANH SÁCH HÓA ĐƠN HOÀN THÀNH</h4>
                         <div class="table-responsive">
                              <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="150px"><p class="text-center">Mã đơn hàng</p></th>
                                        <th width="200px"><p class="text-center">Khách hàng nhận</p></th>
                                        
                                        <th><p class="text-center">Địa chỉ</p></th>
                                        <th><p class="text-center">Ngày đặt hàng</p></th>
                                        <th><p class="text-center">Tổng tiền</p></th>
                                      
                                         <th colspan="2"><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach(  $list_order_follow_status as $lo_status)
                                  {
                                    ?>
                                    <tr>
                                        <td><?php echo $lo_status->id_order; ?></td>
                                          <td><?php echo $lo_status->reciever; ?></td>
                                         
                                          <td><?php echo $lo_status->address_recieve; ?></td>
                                          <td><?php echo date("d-m-Y",strtotime($lo_status->date_order)); ?></td>
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
                                                         <p ><i class="fa fa-2x fa-money" aria-hidden="true"></i>   ĐÃ GIAO HÀNG VÀ THANH TOÁN</p>
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
                                      <td> <a  data-toggle="modal" href='a.php?id_order=<?php echo $lo_status->id_order; ?>' target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
                                          
                                        </td>
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