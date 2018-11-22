      <?php
                
                if(isset($_POST["sub_week_import"]))
				{
			
			
					 $week=date("W", strtotime($_POST['week_import']));
					 $year=date('Y',strtotime($_POST['week_import']));
					
					
				}
			
				else
				{
					$week=$_GET['week'];
					$year=$_GET['year'];
				}
				$list_order=$ad_select->query_statistic_week_import($week,$year);
				$count=count($list_order);
				$limit=4;
				$posision=$ad_pager->findStart($limit);
				$pag=$ad_pager->findPages($count,$limit);
				$param="&week=$week&year=$year";
				$current=$_GET["page"];
			
				$pagination=$ad_pager->pageList($current,$pag,$param);
	
				$list_all_order_follow_week=$ad_select->query_statistic_week_import_page($week,$year,$posision,$limit);
			$total_money=0;
				$total_finish=0;
				$total_product=0;
			 foreach($list_order as $lst)
			  {
				  $total_money+=$lst->total_money;
				   $info_one_order=$ad_select->detail_import_bill($lst->id_import_bill);
				       if($lst->status_import_bill==1)
				   {
					   $total_finish++;
				   }
				   foreach($info_one_order as $lst_od)
				   {
				   $total_product+=$lst_od->quantity_import;
				   }
			  }
				?>
                   <div class="col-xs-12  col-lg-8 col-lg-offset-2">
                    <div class="panel panel-default">
                          <div class="panel-heading">  <h5 class="text-center">DANH SÁCH ĐƠN HÀNG TUẦN 
                        	<?php echo $week." NĂM ".$year;?></h5></div>
                          <div class="panel-body">
                          		<p>TỔNG SỐ PHIẾU NHẬP ĐÃ ĐẶT TRONG THỜI GIAN NÀY:<span class="text-info"> <?php echo $count ?> phiếu nhập</span></p>
                         	 	<p>TỔNG SỐ SẢN PHẨM ĐÃ YÊU CẦU:<span class="text-danger"> <?php echo $total_product; ?> Sản phẩm</span></p>
                                <p>TỔNG SỐ PHIẾU NHẬP ĐÃ  XỬ LÝ:<span class="text-danger"> <?php echo $total_finish; ?>Phiếu</span></p>
                                 <p>TỔNG GIÁ TRỊ CÁC PHIẾU NHẬP:<span class="text-success"> <?php echo number_format($total_money); ?> VNĐ</span></p>
                          </div>
                        </div>
                      </div>  
                        
                      <div class="col-lg-12">
                         <h4 class="text-center text-uppercase">Danh sách phiếu nhập đã lập</h4>
                        <div class="table-responsive">
                              <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="150px"><p>Mã phiếu nhập</p></th>
                                        <th width="200px"><p>Ngày nhập</p></th>
                                        <th><p>Nhân viên phụ trách </p></th>
                                        <th><p>Tổng tiền </p></th>
                                      
                                         <th><p class="text-center">Tác vụ</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                	foreach($list_all_order_follow_week as $lst_im_bill)
									{
								?>
                                    <tr>
                                        <td><?php echo "$lst_im_bill->id_import_bill"; ?></td>
                                        <td><?php echo date("d-m-Y",strtotime($lst_im_bill->date_import)); ?></td>
                                        <td><?php echo "$lst_im_bill->fullname"; ?></td>
                                         <td><?php echo number_format($lst_im_bill->total_money); ?> VNĐ</td>
                                          <td>
                                         <?php 
										   if($lst_im_bill->status_import_bill==1)
											   {
												  ?>
												   <a  data-toggle="modal" href='#import-ib<?php echo $lst_im_bill->id_import_bill; ?>'><i class="fa fa-info-circle text-danger" aria-hidden="true"></i></a>
												  <?php
											   }
											   else
											   {
										  ?>
                                         <a  data-toggle="modal" href='#import-ib<?php echo $lst_im_bill->id_import_bill; ?>'><i class="fa fa-info-circle text-info" aria-hidden="true"></i></a>
                                         <?php
											   }
										 ?>
                                         <div class="modal fade" id="import-ib<?php echo $lst_im_bill->id_import_bill; ?>">
                                             <div class="modal-dialog" width="80%">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                         <h4 class="modal-title text-uppercase text-center">Chi tiết phiếu nhập <?php echo "$lst_im_bill->id_import_bill"; ?></h4>
                                                     </div>
                                                       <div class="modal-body">
                                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info_detail_product">
                                                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 info_account">
                                                            
                                                            <div class="col-xs-12 col-sm-12  col-lg-6 col-lg-offset-3">
                                                            <p ><i class="fa fa-2x fa-address-book-o" aria-hidden="true"></i>   Họ tên nhân viên quản lý: <?php echo "$lst_im_bill->fullname"; ?></p>
                                                            <p ><i class="fa fa-2x fa-envelope-o" aria-hidden="true"> </i>   Email:  <?php echo $lst_im_bill->email;?></p>
                                                            <p><i class="fa fa-3x fa-mobile" aria-hidden="true"></i>    Số điện thoại:<?php echo $lst_im_bill->phone_number;?></p>
                                                            <p ><i class="fa fa-2x fa-map-marker" aria-hidden="true"></i>    Nhà sản xuất / nhà xuất bản cung cấp sản phẩm : <?php echo $lst_im_bill->name_producer_publisher;?></p>
                                                       
                                                          </div>
                                                    </div>
                                                  </div>
                                                 <?php
                                                         	
													$info_detail=$ad_select->detail_import_bill($lst_im_bill->id_import_bill);		
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
                                                    <?php foreach ( $info_detail as $lst_one_import)
                                                     { 
                                                     ?>
                                                       <tr>
                                                        <td><?php echo $lst_one_import->id_product;?></td>
                                                        <td><?php echo $lst_one_import->name_product;?></td>
                                                        <td><img src="assert/product/<?php echo $lst_one_import->image_product;?>" class="img-responsive" alt="Image" width="60px"></td>
                                                        <td><?php echo $lst_one_import->quantity_import;?></td>
                                                        <td><?php echo number_format($lst_one_import->import_price*$lst_one_import->quantity_import)."VNĐ";?></td>
                                                      </tr>
                                                    <?php
                                                     }
                                                     ?>
                                                     <tr>
                                                     <td colspan="4"></td>
                                                     	<td colspan="1">Tổng giá trị đơn hàng:<?php echo number_format($lst_im_bill->total_money).'VNĐ'; ?></td>
                                                     </tr>
                                                     
                                                    </tbody>
                                                  </table>
                                                
                                                </div>
                                                         
                                                     <div class="modal-footer">
                                                         <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                      
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
                        <div class="col-lg-8 col-lg-offset-2" style="text-align:center;">
                        <?php
                        	echo $pagination;
						?>
                    </div>
                   
                </div>