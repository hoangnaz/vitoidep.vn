<script>
	function check_catalog_blog()
	{
		catalog=$("#catalog_blog").val();
		catalog=catalog.trim();
		if(catalog=="")
		{
			alert("Chưa nhập tiêu đề catalog của blog.");
			$("#catalog_blog").select();
			return false;
		}
		var content = CKEDITOR.instances['describle_catalog_blog'].getData();
		content=content.trim();
		if(content=="")
		{
		alert("Chưa nhập mô tả");
		CKEDITOR.instances['describle_catalog_blog'].focus();
		return false;
		}
	}
</script>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 form_info_input"><!-- /.row -->
                 <div class="row">
                    <div class="col-lg-12">
                       <div class="alert alert-success">
                          <p class="text-center">THÊM DANH MỤC MỚI BÀI VIẾT MỚI</p>
                        </div>
                       <div class="col-xs-12 col-sm-12 col-lg-12 form_info_input">
						 					<form action="ad_manipulation/ad_catalog.php" method="POST" role="form" enctype="multipart/form-data">
						 					
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="catalog">Danh mục bài viết:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="text" name="txt_catalog_blog" class="form-control" id="catalog_blog"  required value='<?php echo $_SESSION["catalog"]["name"];?>'>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="describle_catalog">Mô tả danh mục blog:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<textarea type="text" name="txt_describle_catalog_blog" class="form-control" id="describle_catalog_blog"  required><?php echo 	$_SESSION["catalog"]["catalog_describle"];?></textarea>
                                                                   <script>    CKEDITOR.replace( 'txt_describle_catalog_blog' );</script>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					
						 				

						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group" style="text-align:center;">
						 								<button type="submit" name="btn_add_catalog" onclick="return check_catalog_blog()" class="btn btn-primary text-center">Tạo danh mục blog</button>

						 						</div>
						 					
						 					</div>	
						 						
						 					
						 					</form>


		 				</div>
                    </div>
                   
                </div>