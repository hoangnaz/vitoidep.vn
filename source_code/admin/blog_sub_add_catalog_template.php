
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 form_info_input"><!-- /.row -->
                 <div class="row">
                    <div class="col-lg-12">
                       <div class="alert alert-success">
                          <p class="text-center">THÊM DANH MỤC MỚI BÀI VIẾT MỚI</p>
                        </div>
                       <div class="col-xs-12 col-sm-12 col-lg-12 form_info_input">
						 					<form action="ad_manipulation/blog_add_blog_catalog.php" method="POST" role="form" enctype="multipart/form-data">
						 					
						 					<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="catalog">Mã danh mục blog:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="text" maxlength="30" name="txt_catalog_blog_id" class="form-control" id="txt_catalog_blog_id"  required value='<?php echo $_SESSION["catalog_blog"]["txt_catalog_blog_id"];?>'>
						 							</div>
						 						
						 						</div>
						 					
						 					</div> -->
											 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="catalog">Tên dannh mục catalog blog:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<input type="text" maxlength="30" name="txt_catalog_blog_name" class="txt_catalog_blog_name form-control" id="txt_catalog_blog_name"  required value='<?php echo $_SESSION["catalog_blog"]["txt_catalog_blog_name"];?>'>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
											 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="describle_catalog">Mô tả danh mục blog:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<textarea type="text" maxlength="1000" name="txt_describle_catalog_blog" class="txt_describle_catalog_blog form-control" id="txt_describle_catalog_blog"  required><?php echo 	$_SESSION["catalog_blog"]["txt_describle_catalog_blog"];?></textarea>
                                                                   <script>    CKEDITOR.replace( 'txt_describle_catalog_blog' );</script>
						 							</div>
						 						
						 						</div>
						 					</div> 
						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group">
						 							<div class="col-lg-3">
						 								<label for="describle_catalog">Tóm tắt danh mục blog:</label>
						 							</div>
						 							<div class="col-lg-9">
						 						
						 									<textarea type="text" maxlength="300" name="txt_sumary_catalog_blog" class="txt_sumary_catalog_blog form-control" id="txt_sumary_catalog_blog"  required><?php echo 	$_SESSION["catalog_blog"]["txt_sumary_catalog_blog"];?></textarea>
                                                                   <script>    CKEDITOR.replace( 'txt_sumary_catalog_blog' );</script>
						 							</div>
						 						
						 						</div>
						 					
						 					</div>
						 					
						 				

						 					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 						<div class="form-group" style="text-align:center;">
						 								<button type="submit" name="btn_add_write_catalog" onclick="return check_catalog_blog()" class="btn btn-primary text-center">Tạo danh mục blog</button>

						 						</div>
						 					
						 					</div>	
						 						
						 					
						 					</form>


		 								</div>
									</div>
                   
                </div>