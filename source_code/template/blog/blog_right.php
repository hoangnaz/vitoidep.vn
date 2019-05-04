<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/blog_catalog.php'; 
	require_once $_SERVER['DOCUMENT_ROOT'].'/functionBL/blog.php'; 
	$catalogPost = new blogCatalog();
	$blogPost = new blogPostBL();
	$lstCatalogBlog = $catalogPost->getListCatalog();
	$topFive = $blogPost->topFiveView();
?>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		      			<div class="widget widget-category">
							<h4 class="widget-title">Danh mục blog</h4>
							<ul class="widget-category-list">
							<?php
								foreach ($lstCatalogBlog as $key1 => $value1) 
								{
										?>
										<li><a href="blog?chuyen_muc=<?php echo $value1->id_catalog;?>">
											<?php echo $value1->name_blog;?></a>
						        		</li>
                                <?php
								}
							?>
			
						    </ul>
						</div>
		      			<h5 class="text-center text-uppercase"><b>Top 5 xem nhiều nhất</b></h5>	
						  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="post">
						<?php
							$count = 0;
							foreach ($topFive as $keyTopFive => $valueTopFive) {
								if($valueTopFive->status == 0){
								
									if($count == 0){
										?>
											<div class="post-media post-thumb">
												<a href="blog-single">
													<img src="images/user_info/<?php echo $valueTopFive->image_blog;?>" alt="<?php echo $valueTopFive->image_blog;?>">
												</a>
											</div>
										<?php
									}
									?>
										<h5 ><a href="blog-single.php?post=<?php echo $valueTopFive->blog_id;?>"><?php echo $valueTopFive->blog_name;?></a></h5>
											<div class="post-meta-right ">
												<ul>
													<li>
														<i class="tf-ion-ios-calendar"></i> <?php echo $valueTopFive->date_update;?>
													</li>
													<li>
														<i class="tf-ion-android-person"></i> POSTED BY <?php echo $valueTopFive->create_user;?>
													</li>
													
												</ul>
											</div>
									<?php
								}
								$count++;
							}
							
						?>
		    		    </div>	
		      		</div>
	      		</div>
	      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		      			<h5 class="text-center text-uppercase"><b>Sản phẩm khuyên dùng</b></h5>	
		      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							 <a  href="http://xukoda-vn.fastbuy.biz/?click_id=5c970bb841195300416b4df1&aff_sub1=&aff_sub2=&aff_sub3=&aff_sub4=&fb_pixel_id=&opid=7nh7JaTL4HraTdopAZG_vjuyaDifmyMQyrX4cblsgmQ" > 
						 <h5>
						 Bài thuốc đặc trị xương khớp XUKODA</h5>
						 </a>
		      				<div class="post">						
						<a href="http://xukoda-vn.fastbuy.biz/?click_id=5c970bb841195300416b4df1&aff_sub1=&aff_sub2=&aff_sub3=&aff_sub4=&fb_pixel_id=&opid=7nh7JaTL4HraTdopAZG_vjuyaDifmyMQyrX4cblsgmQ">
							<img src="images/ads/viem_khop_qc.png" class="img-responsive" alt="Image">
						</a>

						
					</div>	
		      			</div>
		      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		      				<div class="widget widget-tag">
								<h4 class="widget-title">Tag </h4>
								<ul class="widget-tag-list">
							        <li class="text-danger"><a href="blog?chuyen_muc=tam-su-chia-se">Làm đẹp</a>
							        </li>
							        <li  class="text-info"><a href="blog?chuyen_muc=review-danh-gia-san-pham">Review sản phẩm</a>
							        </li>
							        <li><a href="blog?chuyen_muc=meo-vat-cuoc-song">Mẹo vặt</a>
							        </li>
							        <li><a href="danh_sach_san_pham.php?sanpham=MEKENHANOI">Mẹ Ken</a>
							        </li>
							        <li><a href="danh_sach_san_pham?sanpham=10XBEAUTY">10x Beauti</a>
							        </li>
							    </ul>
							</div>
		      			</div>	
	      		</div>
	      	</div>
	</div>
</div>
