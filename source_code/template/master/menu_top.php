
 <script>
	search();
  </script>
</head>
<body id="body"   >
<!-- Start Top Header Bar -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header_top">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 message_deliver">
		<div class="container-fluid delivery_ads">
			<marquee class="maquee" direction="right"  onMouseOver="this.stop()" onMouseOut="this.start()">
			<p>Miễn phí vận chuyển cho đơn hàng trị giá từ 1.000.000 VNĐ  <i class="fa fa-phone-square" aria-hidden="true"></i> 0962876192 </p></marquee>
		</div>  
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 search_form_fast">
		<form class="search_product" method="GET"  action="result_search.php">
		<input type="text" id="skill_input" class="form-control" placeholder="Tìm kiếm sản phẩm của Vì tôi đẹp ">
		<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
</div>
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<a href="tel:0962876192">
						<i class="tf-ion-ios-telephone"></i>
						<span>0962876192</span>
					</a>
					<a href="mailto:Vitoidep2018@gmail.com" style="padding-left:10px;">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<span>Vitoidep2018@gmail.com</span>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->

				<div class="logo text-center hidden-xs hidden-sm">
					<a href="index">
						<img src="images/logo.png" class="img-responsive img-logo" alt="Image"  height="29px" >
					</a>
				</div>

				<!-- Site Logo -->
				<div class="logo text-center hidden-lg">
					<a href="index.php">
						<img src="images/logo.png" class="img-responsive img-logo-sm" alt="Image"  height="29px" >
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">

			<!-- Header Cart -->
			<ul class="top-menu text-right list-inline">
	          <li class="dropdown cart-nav dropdown-slide">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Giỏ hàng
					<?php
					if($_SESSION["product_cart"] && count($_SESSION["product_cart"])>0){
						?>
						<i class="tf-ion-android-cart text-success"></i>
						<span class="text-success ajax_number_cart">
						</span>
						<span class="text-success number_cart">(
						<?php
						echo count($_SESSION["product_cart"]);
						echo ")</span>";
					}
					else{
					?>
					
						<i class="tf-ion-android-cart "></i>
					<?php
						}

					?>
				</a>
	            <div class="dropdown-menu cart-dropdown">
					<div id="ajax_shopping_cart">
						
					</div>			
					<div id="shopping_cart"> 
				
					<!-- Show shopping cart -->
					<?php
						if($_SESSION["product_cart"] && count($_SESSION["product_cart"])>0 ){
							$totalMoney=0;
							foreach ($_SESSION["product_cart"] as $key => $value) {
								?>
								<!-- Cart Item -->
								<div class="media">
									<a class="pull-left" href="product-single?name=<?php echo $value["info"]->name_product_no_vietnamse;?>">
										<img  class="media-object" src="images/product/<?php echo $value["info"]->image_product;?>" alt="image" />
									</a>
									<div class="media-body">
										<h4 class="media-heading"><a href=""><?php echo $value["info"]->product_name;?></a></h4>
										<div class="cart-price">
										<span>Số lượng:<?php echo $value["number"];?></span>
										<span>Giá:<?php echo number_format((1-$value["info"]->point_promotion/100)*$value["info"]->price_product) ;?>VNĐ</span>
										</div>
										<h5><strong> Tổng : <?php  echo number_format($value["number"]*((1-$value["info"]->point_promotion/100)*$value["info"]->price_product)) ;?>VNĐ</strong></h5>
									</div>
									<a  class="remove" onclick="delete_product_cart(<?php echo $key;?>)"><i class="tf-ion-close"></i></a>
								</div>
								
								<?php
								$totalMoney+=($value["number"]*((1-$value["info"]->point_promotion/100)*$value["info"]->price_product));
							}
							?>
									<!-- / Cart Item -->
									<div class="cart-summary">
									<span>Tổng tiền:</span>
									<span class="total-price"><?php echo number_format($totalMoney);?>VNĐ</span>
								</div>
								<ul class="text-center cart-buttons">

									<li><a href="shopping_cart.php" class="btn btn-small">Giỏ hàng</a></li>
									<li><a href="check_out.php" class="btn btn-small btn-solid-border">Thanh toán</a></li>

								</ul>

							<?php
						}
						else{
							?>
							<p>Bạn chưa có sản phẩm trong giỏ</p>
						<?php
						}
					?>

					</div>
					
                </div>

	          </li><!-- / Cart -->
			<?php
				if($_SESSION['customer']){
					?>
					<li >
						<a href="user_message.php"><i class="fa fa-bell" aria-hidden="true"></i></a>
					</li>
					<?php
				}
			?>
	         

	          <!-- User Info -->
				<li >
					<div class="dropdown">

				<?php
				
						if($_SESSION['customer']){
						
							?>
							
									<a class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $_SESSION['customer']->fullname;?> <span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
									<li class="dropdown-header">Tài khoản</li>
									<li>
									<a href="user_info.php" >Thông tin cá nhân</a>
									</li>
									<li><a href="general_info.php" >Lịch sử mua hàng</a></li>
									<li>	<a href=""  data-toggle="modal" data-target="#updatePassword">Thay đổi mật khẩu</a></li>
									<li><a href="function/logout.php" >Đăng xuất</a></li>
									</ul>
								
							<!-- / User Info -->
							
						<?php
							}
							else{
						?>		
							<a href=""  data-toggle="modal" data-target="#sign_in">Đăng nhập</a>
				<?php
						}

				?>

					</div>
				</li>

				
			  <!-- / Search -->

			 
			</ul>
			
			</div>
			
		</div>
		
	</div>
	
</section>

<!-- End Top Header Bar -->