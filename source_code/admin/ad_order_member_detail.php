<?php
	
	$lst_order_staff=$ad_select->list_order_follow_staff($_GET["id_staff"]);
	$count=count($lst_order_staff);
	$limit=15;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$list_order_follow_staff_page=$ad_select->list_order_follow_staff_page($_GET["id_staff"],$posision,$limit);
	if(sizeof($list_order_follow_staff_page)==0)
	{
		echo '<p class="text-center">Hiện tại bạn không đơn hàng nào trong danh mục quản lý của bạn</p>';
	}
	else
	{
  //print_r($list_order_follow_status);

	//print_r($lst_custom_pagination);
?>
<!-- /.row -->
                 <div class="row">
               	
                   
                    <div class="col-lg-12">
                        <h4 class="text-center">DANH SÁCH ĐƠN HÀNG </h4>
                        <div class="table-responsive">
                              <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="150px"><p class="text-center">Mã đơn hàng</p></th>
                                        <th width="200px"><p class="text-center">Khách hàng nhận</p></th>
                                        
                                        <th><p class="text-center">Địa chỉ</p></th>
                                        <th><p class="text-center">Ngày đặt hàng</p></th>
                                        <th><p class="text-center">Tổng tiền</p></th>
                                      
                                         <th><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach(	$list_order_follow_staff_page as $lo_status)
                  								{
                  									?>
                                    <tr>
                                        <td><?php echo $lo_status->id_order; ?></td>
                                          <td><?php echo $lo_status->reciever; ?></td>
                                         
                                          <td><?php echo $lo_status->address_recieve; ?></td>
                                          <td><?php echo $lo_status->date_order; ?></td>
                                          <td><?php echo number_format($lo_status->total_money_order).'VNĐ'; ?></td>
                                        <td>
                                           <a  data-toggle="modal" href='#<?php echo $lo_status->id_order; ?>'><i class="fa fa-info-circle text-info" aria-hidden="true">Thông tin đơn hàng</i></a>
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
                                                         <p ><i class="fa fa-2x fa-money" aria-hidden="true"></i>   Tình trạng:  
														 <?php if($lo_status->status_order==1)
														 {
														 	echo "Chưa thanh toán, chưa giao hàng";
														 }
														 else if($lo_status->status_order==2)
														 {
														 	echo "<span class='text-info'>Đã thanh toán online, chưa giao hàng</span>";
														 }
														 ?>
                                                         </p>
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
                                                        <td><img src="assert/product/<?php echo $lst_one_order->image_product;?>" class="img-responsive" alt="Image" width="60px"></td>
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
                <?php 
				}
				?>