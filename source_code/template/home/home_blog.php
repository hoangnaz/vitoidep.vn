<!-- blog section -->
 <section class="section  bg-gray section">
	<div class="container">
		<div class="row">
			<div class="title">
				<h2>Trang blog của chúng tôi</h2>
			</div>
		</div> 
		<div class="row">
			<div class="col-md-12">
				<?php
					foreach ($topFive as $key => $valueTopFive) 
					{
				?>
				<div class="col-sm-12 col-md-3">
					<div class="col-md-12">
						<img src="../images/user_info/<?php echo $valueTopFive->image_blog;?>"  class="img-responsive" alt="Image">
					</div>
					<div class="col-md-12 title_blog">
						<a href="blog-single.php?post=<?php echo $valueTopFive->blog_id;?>"><p class="text-center"><?php echo $valueTopFive->blog_name;?></p></a>
						<p class="text-right time_blog_publish"><i> <?php echo $valueTopFive->date_update;?></i></p>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div> 
	</div>
</section> 

<!-- Start Call To Action -->
