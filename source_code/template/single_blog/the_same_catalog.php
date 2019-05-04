<section class="section">
	<div class="container">
		<div class="row">
			<div class="title">
				<h2>Bài viết cùng thể loại</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<?php
				foreach ($allBlogFollowCatalog As  $blogPostLst) {
					?>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<img src="images/user_info/<?php echo $blogPostLst->image_blog;?>" class="img-responsive" alt="Image">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_blog">
						<a  href="blog-single.php?post=<?php echo $blogPostLst->blog_id;?>"><p class="text-center"><?php echo $blogPostLst->blog_name;?></p></a>
						<p class="text-right time_blog_publish"><i><?php echo $blogPostLst->date_update;?></i></p>
					</div>
				</div>
				<?php
				}
			?>
				
			</div>
		</div>
	</div>
</section>