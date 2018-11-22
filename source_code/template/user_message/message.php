

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
								<li class="margin_top_10"><a href="general_info.php">Lịch sử mua hàng</a></li>
								<li class="message"><a  href="user_message.php" class="active"> <i class="fa fa-bell" aria-hidden="true"></i> Thông báo của bạn</a></li>
								
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
						<h4>Thông báo của bạn</h4>
					<?php
					
						foreach ($lstMessage as $key => $value) {
							?>
									<div class="panel panel-default">
										<div class="panel-heading">Thông báo</div>
										<div class="panel-body">
											<p><span>Ngày:</span><span><?php echo $value->date_update;?></span></p>
											<p><span>Nội dung:</span><span><?php echo $value->content_message;?></span></p>
										</div>
									</div>

							<?php
						}
					
					?>
					
           
							</div>
					</div>
		
				</div>
			</div>
		</div>
	</div>
</div>
</section>




