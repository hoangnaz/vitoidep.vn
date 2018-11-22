<?php
	 require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/catalog_product.php';  
	 $blCatalog= new catalogProduct();
		error_reporting(0);
		// list product from line 43to 58
?>
<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
	    <div class="container">
	      <div class="navbar-header">
	      	<h2 class="menu-title">Vì tôi đẹp</h2>
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button>
	      </div><!-- / .navbar-header -->
	      <!-- Navbar Links -->
	      <div id="navbar" class="navbar-collapse collapse text-center">
	        <ul class="nav navbar-nav">
	          <!-- Home -->
	          <li class="dropdown ">
	            <a href="index.php">Trang chủ</a>
	          </li><!-- / Home -->
	          <!-- Intro -->
	          <li>
	            <a href="intro.php">Giới thiệu</a>
	          </li><!-- / Intro -->
	          <!-- Contact -->
	          <li>
	            <a href="contact.php">Liên hệ</a>
	          </li><!-- / Contact -->
	            <!-- Product -->
	          <li class="dropdown full-width dropdown-slide">
	            <a href="shop.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm <span class="tf-ion-ios-arrow-down"></span></a>
	            <div class="dropdown-menu">
	              	<div class="row">

										<?php
											foreach ($blCatalog->lstSubProduct() as $keyCatalog => $valueCatalog) {
													?>
														 <div class="col-sm-3 col-xs-12">
		                						<ul>
																<li class="dropdown-header"><h5><?php echo  $keyCatalog;?></h5></li>
															<?php
																foreach ($valueCatalog as $key => $value) {
															?>
																	<li><a href="danh_sach_san_pham.php?sanpham=<?php echo $value->sub_catalog_id; ?>"><?php  echo $value->sub_catalog_name;?></a></li>
															<?php	
																}
															?>
														</ul>
													</div>
													<?php
												}
									  	?>		              
		                <!-- Mega Menu -->
		                <div class="col-sm-3 col-xs-12">
		                	<a href="shop.php">
			                	<img class="img-responsive" src="images/logo.png" alt="menu image" />
		                	</a>
		                </div>
	              	</div><!-- / .row -->
	            </div><!-- / .dropdown-menu -->
			  </li><!-- / Pages -->
			  
	          <!-- Blog -->
	          <!-- <li class="dropdown dropdown-slide">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="tf-ion-ios-arrow-down"></span></a>
	            <ul class="dropdown-menu">
	            	<div class="container-fluid">
	            		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	            			<li><a href="blog-full-width.php">
									<h6> Chăm sóc da</h6>
								</a>
							</li>
	            		</div>
	            		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	            			<li>
	            				<a href="blog-full-width.php">
	            					<h6> Hướng dẫn làm đẹp</h6>
	            				</a>
	            			</li>
	            		</div>
	            		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	            			<li>
	            				<a href="blog-full-width.php">
	            			 		<h6>Game show</h6>
	            				</a>
	            			</li>
	            		</div>
	            		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	            			<li>
	            				<a href="blog-full-width.php">
		            				<h6>Review sản phẩm</h6>
	            				</a>
	            			</li>
	            		</div>
	            	</div>
	            </ul>
	          </li> -->
						<!-- / Blog -->

			<!-- Branch -->
	          <li class="dropdown dropdown-slide">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Đại lý bán hàng <span class="tf-ion-ios-arrow-down"></span></a>
	            <ul class="dropdown-menu">
	            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	            			<li>
	            				<a href="recruiment_branch.php">
		            				<h6>Tuyển dụng đại lý</h6>
	            				</a>
	            			</li>
	            	</div>
	            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	            			<li>
	            				<a href="list_branch.php">
		            				<h6>Danh sách đại lý bán hàng</h6>
	            				</a>
	            			</li>
	            	</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	            			<li>
	            				<a href="policy.php">
		            				<h6>Chính sách bán hàng</h6>
	            				</a>
	            			</li>
	            	</div>
	            	
	            			
	            </ul>
	          </li><!-- / Branch -->
	        </ul>

	      	</div>
	    </div>
	</nav>
<!-- End nav	 -->