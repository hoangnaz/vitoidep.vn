

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Lịch sử mua hàng</h1>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline dashboard-menu text-center">
						<ul class="list-inline dashboard-menu text-center">
								<li ><a href="user_info.php">Thông tin cá nhân</a></li>
								<li class="active margin_top_10" ><a href="general_info.php">Lịch sử mua hàng</a></li>
								<li  class="message"><a  href="user_message.php"> <i class="fa fa-bell" aria-hidden="true"></i> Thông báo của bạn</a></li>
								
							</ul>
				</ul>
				<div class="dashboard-wrapper user-dashboard">
					<div class="media ">
						
						<div class="media-body">
							<h2 class="media-heading text-center">Xin chào nguyễn anh hoàng</h2>
							<p class="text-center">Chào mừng bạn quay lại với vì tôi đẹp</p>
						</div>
					</div>
					
					<div class="total-order mt-20">
						<h4>Danh sách đơn hàng của bạn</h4>
						<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Tổng số đơn hàng</th>
											<th>Số điểm tích được từ mua hàng</th>
											<th>Tổng tiền đã thanh toán</th>
											<th></th>
										</tr>
									</thead>
											<tbody>
												<tr>
													<td><a href="#"><?php echo  $lstOrder["totalOrder"];?> đơn hàng</a></td>
													
													<td><?php echo  $_SESSION["customer"]->point;?> điểm</td>
													<td><?php echo  number_format($lstOrder["totalMoney"]);?> VNĐ</td>
												</tr>
												
											</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Mã đơn hàng</th>
											<th>Ngày mua</th>
											
											<th>Tổng tiền đã thanh toán</th>
											<th>Trạng thái đơn hàng</th>
											<th>Chi tiết đơn hàng</th>
										</tr>
									</thead>
											<tbody>
											<?php
											
												foreach ($lstOrder['order'] as $key => $lstOrderProduct) {
												switch ($lstOrderProduct->status_order) {
													case 1:
														$status="Đặt hàng thành công.";
														break;
													case 2:
														$status="Đang vận chuyển.";
														break;
													case 3:
														$status="Chờ giao hàng.";
														break;	
													
													
												}
											?>
												<tr>
													<td><a href="#"><?php echo  $lstOrderProduct->id_order;?></a></td>
													<td><?php echo  $lstOrderProduct->date_order;?></td>
													<td><?php echo  number_format($lstOrderProduct->total_money_order);?>VNĐ</td>
													<td><p><?php echo $status;?></p></td>
													<td><a  data-toggle="modal" href='#modal-id<?php echo  $lstOrderProduct->id_order;?>'><i class="fa fa-info" aria-hidden="true"></i></a></td>
												</tr>
											<!-- Modal -->
		
											<?php
												}
											?>	
												
											</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<!-- show detail order -->
<?php
	foreach ($lstOrder['order'] as $key => $lstOrderProduct) {
?>
<div class="modal fade" id="modal-id<?php echo  $lstOrderProduct->id_order;?>" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content" style="height: 500px;">
					<div class="modal-body">
					
						<div >
							<div class="block">
							   <h4 class="widget-title text-uppercase text-center">Thông tin đơn hàng của bạn</h4>
							   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<h5 class="media-heading">Họ tên người nhận: <span ><?php echo $lstOrderProduct->reciver;?></span></h5>
									<h5 class="media-heading">Số điện thoại: <span  ><?php echo $lstOrderProduct->phone_nummber;?></span></h5>
									<h5 class="media-heading">Email: <span ><?php echo $lstOrderProduct->email;?></span></h5>
									<h5 class="media-heading"> Địa chỉ:  <span ><?php echo $lstOrderProduct->address_recieve;?></h5>
									<table class="table table-hover">
									 <thead>
										 <tr>
											 <th>STT</th>
											 <th>Tên sản phẩm</th>
											 <th>Số lượng</th>
											 <th>Đơn giá</th>
											 <th>Thành tiền</th>
										 </tr>
									 </thead>
									 <tbody>
										 <tr>
										   <?php
										   	
										   		$lstProductInList=$detailOrder->getLstProductOrder($lstOrderProduct->id_order);
												$order=0;
											$totalMoney=0;
												foreach ($lstProductInList as $key => $value) {
													$order++;
													
											?>
											 <td>
												 <?php echo $order;?>
											 </td>
											 <td>
											 	<?php echo $value->product;?>
											 </td>
											 <td>
												 <?php echo $value->quantity_one_product;?>
											 </td>
											 <td>
												<?php 
													
													echo number_format( $value->price_product).'VNĐ';
												?>
											 </td>
											 <td>
												 <?php echo number_format( $value->price_product*$value->quantity_one_product).'VNĐ';
												 ?>
											 </td>
										
										 </tr>
										 <?php
										 	$totalMoney+=$value->price_product*$value->quantity_one_product;

												}
										?>	 
									 </tbody>
								 </table>
								 <h5 class="media-heading"> Tổng tiền đơn hàng:  <span ><?php
								 			 echo number_format($totalMoney).'VNĐ';
										?></h5>
					 			</div>
								 
								
	
							</div>
							 
							  
						</div>
					</div>
				</div>
			</div>
		</div>
	
					<!-- end modal -->	
				<?php
	}
				?>	