      <?php
                
                if(isset($_POST["sub_week_order"]))
				{
			
			
					 $week=date("W", strtotime($_POST['week_order']));
					 $year=date('Y',strtotime($_POST['week_order']));
					
					
				}
			
				else
				{
					$week=$_GET['week'];
					$year=$_GET['year'];
				}
				$list_order=$ad_select->query_statistic_week_order($week,$year);
				$count=count($list_order);
				$limit=4;
				$posision=$ad_pager->findStart($limit);
				$pag=$ad_pager->findPages($count,$limit);
				$param="&week=$week&year=$year";
				$current=$_GET["page"];
			
				$pagination=$ad_pager->pageList($current,$pag,$param);
	
				$list_all_order_follow_day=$ad_select->query_statistic_week_order_page($week,$year,$posision,$limit);
				$total_money=0;
				$total_order_finish=0;
				$total_product=0;
			 foreach($list_order as $lst)
			  {
				  $total_money+=$lst->total_money_order;
				  if($lst->status_order==3)
				  {
					  $total_order_finish++;
				  }
				   $info_one_order=$ad_select->list_product_in_order($lst->id_order);
				   foreach($info_one_order as $lst_od)
				   {
				   $total_product+=$lst_od->pro_quantity;
				   }
			  }
				?>
                   <div class="col-xs-12  col-lg-8 col-lg-offset-2">
                    <div class="panel panel-default">
                          <div class="panel-heading">  <h5 class="text-center">DANH SÁCH ĐƠN HÀNG TUẦN  
                        	<?php echo $week." NĂM ".$year;?></h5></div>
                          <div class="panel-body">
                          		<p>TỔNG SỐ ĐƠN HÀNG ĐÃ ĐẶT TRONG THỜI GIAN NÀY:<span class="text-info"> <?php echo $count ?> Đơn hàng</span></p>
                         	 	<p>TỔNG SỐ ĐƠN HÀNG ĐÃ GIAO:<span class="text-danger"> <?php echo $total_order_finish; ?> Đơn hàng</span></p>
                                <p>TỔNG SỐ SẢN PHẨM TRONG ĐƠN HÀNG:<span class="text-success"> <?php echo $total_product; ?> Sản phẩm</span></p>
                                 <p>TỔNG GIÁ TRỊ CÁC ĐƠN HÀNG:<span class="text-success"> <?php echo number_format($total_money); ?> VNĐ</span></p>
                          </div>
                        </div>
                      </div>  
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <div class="table-responsive">
                              <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="150px"><p class="text-center">Mã đơn hàng</p></th>
                                        <th width="200px"><p class="text-center">Khách hàng nhận</p></th>
                                        
                                        <th><p class="text-center">Địa chỉ</p></th>
                                        <th><p class="text-center">Ngày đặt hàng</p></th>
                                        <th><p class="text-center">Tổng tiền</p></th>
                                      
                                         <th ><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach(  $list_all_order_follow_day as $lst_ord)
                                  {
                                    ?>
                                    <tr>
                                        <td><?php echo $lst_ord->id_order; ?></td>
                                          <td><?php echo $lst_ord->reciever; ?></td>
                                         
                                          <td><?php echo $lst_ord->address_recieve; ?></td>
                                          <td><?php echo date("d-m-Y",strtotime($lst_ord->date_order)); ?></td>
                                          <td><?php echo number_format($lst_ord->total_money_order).'VNĐ'; ?></td>
                                        <td>
                                           <a  data-toggle="modal" href='#<?php echo $lst_ord->id_order; ?>'><i class="fa fa-info-circle text-info" aria-hidden="true"></i></a>
                                            <div class="modal fade" id="<?php echo $lst_ord->id_order; ?>" tabindex="-1">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title text-center text-uppercase">Đơn hàng <?php echo $lst_ord->id_order; ?></h4>
                                                  </div>
                                                  <div class="modal-body">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info_detail_product">
                                                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 info_account">
                                                            
                                                            <div class="col-xs-12 col-sm-12  col-lg-6 col-lg-offset-3">
                                                            <p ><i class="fa fa-2x fa-address-book-o" aria-hidden="true"></i>   Họ tên người nhận: <?php  echo $lst_ord->reciever;?></p>
                                                            <p ><i class="fa fa-2x fa-envelope-o" aria-hidden="true"> </i>   Email:  <?php echo $lst_ord->email;?></p>
                                                            <p><i class="fa fa-3x fa-mobile" aria-hidden="true"></i>    Số điện thoại: <?php echo $lst_ord->phone_nummber?></p>
                                                            <p ><i class="fa fa-2x fa-map-marker" aria-hidden="true"></i>    Địa chỉ giao hàng mặc định: <?php echo $lst_ord->address_recieve;?></p>
                                                         <p ><i class="fa fa-2x fa-money" aria-hidden="true"></i>  <?php
														  if($lst_ord->status_order==1)
														  {
															  echo "Chưa thanh toán, chưa giao hàng";
														  }
														  elseif($lst_ord->status_order==2)
														  {
															  echo "Đã thanh toán, chưa giao hàng";
														  }
														  else
														  {
															  echo "Giao hàn và hoàn tất thanh toán";
														  }
														  
														  ?></p>
                                                          </div>
                                                    </div>
                                                  </div>
                                                  <?php
                                                  $info_one_order=$ad_select->list_product_in_order($lst_ord->id_order);
                                                

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
                                                      <td colspan="1">Tổng giá trị đơn hàng:<?php echo number_format($lst_ord->total_money_order).'VNĐ'; ?></td>
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
                        </div>
                       
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">
                          <?php 
                          echo $pagination;
                          ?>
                        </div>
                    </div>
                   
                </div>
          