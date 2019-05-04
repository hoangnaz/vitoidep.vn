<section >
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="post post-single">
					
					<h1 class="post-title text-uppercase text-center text-danger text-uppercase"><?php echo $infoPost->blog_name;?></h1>
					  <div class="post-social-share">
				        <h6 class="post-sub-heading ">Chuyên mục: <?php echo $infoPost->blog_catalog;?></h6>
				        <div class="social-media-icons">
				        	<ul>
								<li><a class="facebook"  onclick="share_fb('http://vitoidep.vn/blog-single.php?post=<?php echo $infoPost->viet_nam_title;?>');return false;" rel="nofollow" share_url="http://vitoidep.vn/blog-single.php?post=<?php echo $infoPost->viet_nam_title;?>" target="_blank"><i class="tf-ion-social-facebook"></i></a></li>
								<li><a class="twitter"  onclick="share_twiter('http://vitoidep.vn/blog-single.php?post=<?php echo $infoPost->viet_nam_title;?>');return false;" rel="nofollow" share_url="http://vitoidep.vn/blog-single.php?post=<?php echo $infoPost->viet_nam_title;?>" target="_blank"><i class="tf-ion-social-twitter"></i></a></li>
								<!-- <li><a class="dribbble" href=""><i class="tf-ion-social-dribbble-outline"></i></a></li>
								<li><a class="instagram" href=""><i class="tf-ion-social-instagram"></i></a></li>
								<li><a class="googleplus" href=""><i class="tf-ion-social-googleplus"></i></a></li> -->
							</ul>
				        </div>
				    </div>

					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-ios-calendar"></i> <?php echo $infoPost->date_update;?>
							</li>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY  <?php echo $infoPost->create_user;?>
							</li>
							<li>
								<a href=""><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href=""> TRAVEL</a>, <a href="">FASHION</a>
							</li>
							<li>
								<a href=""><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a>
							</li>
						</ul>
					</div>
					<div class="post-content post-excerpt">
							<?php echo $infoPost->content_full;?>
				  </div>
				  