<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/library/page.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/database/blog_post.php';
	if(isset($_GET['chuyen_muc'])){
		$limit = 2;
		$posotion = -1;
		$blogPostDB = new blogPostDB();
		$page = new pagination();
		$totalAllBlog = count($blogPostDB -> getAllBlogFollowCondition($_GET['chuyen_muc']));
		$posotion=$page->findStart($limit);
		$current=$_GET["page"];
		$pag=$page->findPages($totalAllBlog,$limit);
		$pagination=$page->pageList($current,$pag,$_GET['chuyen_muc'],"");
		$allRecorde = $blogPostDB->getAllBlogPostPanigation($posotion,$limit,$_GET['chuyen_muc']);
		
	}
?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h3 class="page-name">Blog Vì Tôi Đẹp</h3>
					
				</div>
			</div>
		</div>
	</div>
</section>
<div >
	<div class="container">
		<div class="row">
			<div class="col-md-9">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_name_blog">
				<h2 class="page-name"><p class="text-uppercase"><b><?php //echo $title;?></b></p></h2>
				<hr>
				<?php
					if(count($allRecorde)==0){
						?>
					
							<img class="img-responsive" src="images/blog/not_founf_write.png" alt="" style="width:100%;">
					
					<?php
					}
					else{
						foreach($allRecorde as $lstBlogPost){
							?>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="post">
										<div class="post-media post-thumb">
											<a href="blog-single.php?post=<?php echo $lstBlogPost->blog_id;?>">
												<img src="images/user_info/<?php echo $lstBlogPost->image_blog;?>" alt="">
											</a>
										</div>
										<h4 class="post-title"><a href="blog-single.php?post=<?php echo $lstBlogPost->blog_id;?>"><?php echo $lstBlogPost->blog_name;?></a></h4>
										<div class="post-meta">
											<ul>
												<li>
													<i class="tf-ion-ios-calendar"></i> <?php echo $lstBlogPost->date_update;?>
												</li>
												<li>
													<i class="tf-ion-android-person"></i> NGƯỜI VIẾT: <?php echo $lstBlogPost->create_user;?>
												</li>
												<!-- <li>
													<a href=""><i class="tf-ion-ios-pricetags"></i> <?php echo $title;?></a>,<a href=""> LÀM ĐẸP</a>, <a href="">TÂM SỰ</a>
												</li> -->
												<li>
													<a href="blog-single.php?post=<?php echo $lstBlogPost->blog_id;?>"><i class="tf-ion-chatbubbles"></i> 4 BÌNH LUẬN</a>
												</li>
											</ul>
										</div>
										<div class="post-content blog_sumary" style=" height: 144px; overflow: hidden;">
											<p><?php echo $lstBlogPost->content_sumary;?> </p>
											
										</div>
										<a href="blog-single.php?post=<?php echo $lstBlogPost->blog_id;?>" class="text-center"><p><u><i>Xem bài viết</i></u></p></a>

									</div>
								</div>
							<?php
						}
					}
					?>
			</div>
			<?php
			
			
			//	foreach ($allRecorde as $key => $lstBlog) {
			?>
			
				
			<?	
				//}
			?>	
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="text-center">
						<ul class="pagination post-pagination">
							<?php
								echo $pagination;
							?>
						</ul>
					</div>
				</div>
				
	      	</div>