<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Mô tả sản phẩm</a></li>
						<li class=""><a data-toggle="tab" href="#reviews" aria-expanded="false">Đánh giá sản phẩm</a></li>
					</ul>
					<div class="tab-content patternbg">
						<div id="details" class="tab-pane fade active in">
							<h4>Mô tả chi tiết sản phẩm</h4>
							<?php echo $infoProduct->describle_product;?>
						</div>
						<div id="reviews" class="tab-pane fade">
							<div class="post-comments">
							<div class="fb-comments" data-href="http://localhost:84/product-single.php?name=<?php echo $infoProduct->name_product_no_vietnamse; ?>" data-numposts="5">
							</div>
						    	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>