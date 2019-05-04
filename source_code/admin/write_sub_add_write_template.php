<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/database/catalog_blog.php';
	$catalogBlogDB = new blogCatalogtDB();
	$listCatalogBlog = $catalogBlogDB->getAllBlogCatalog();
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form_info_input">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success">
                <p class="text-center">VIẾT BÀI MỚI</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12 form_info_input">
                <form action="ad_manipulation/write_add_blog.php" enctype="multipart/form-data" method="POST"
                    role="form" enctype="multipart/form-data">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data">
                        <div class="form-group">
                            <div class="col-lg-2">
                                <label for="catalog">Mời nhập tiều đề:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" maxlength="300" name="txt_blog_name"
                                    class="txt_blog_name form-control" id="txt_blog_name" required
                                    value='<?php echo $_SESSION["blog_content"]["txt_blog_name"];?>'>
                            </div>

                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <div class="col-lg-2">
                                <label for="describle_catalog">Mô tả tóm tắt:</label>
                            </div>
                            <div class="col-lg-10">

                                <textarea type="text" maxlength="500" name="txt_describle_blog"
                                    class="txt_describle_blog form-control" id="txt_describle_blog" required>
															 	<?php echo 	$_SESSION["blog_content"]["txt_describle_blog"];?>
															</textarea>
                                <script>
                                CKEDITOR.replace('txt_describle_blog');
                                </script>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <div class="col-lg-2">
                                <label for="content_blog">Nội dung bài viết blog:</label>
                            </div>
                            <div class="col-lg-10">
                                <textarea type="text" maxlength="10000" name="txt_content_blog"
                                    class="txt_content_blog form-control" id="txt_content_blog" required>
														 <?php echo 	$_SESSION["blog_content"]["txt_content_blog"];?></textarea>
                                <script>
                                CKEDITOR.replace('txt_content_blog');
                                </script>
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <div class="col-lg-2">
                                <label for="content_blog">Danh mục catalog blog:</label>
                            </div>
                            <div class="col-lg-10">

                                <select name="sl_blog_catalog" id="sl_blog_catalog" class="sl_blog_catalog form-control"
                                    required="required">
                                    <?php
										foreach($listCatalogBlog as $key=> $value){
									?>
                                    <option value="<?php echo  $value->id_catalog;?>">
                                        <?php echo  $value->name_blog;?></option>
                                    <?php
										}
									?>

                                </select>

                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <div class="col-lg-2">
                                <label for="content_blog">Hình ảnh bài viết:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="img_content" id="img_content" required
                                    onclick="return auto_load_img()">
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <img src="im" id="img_avt" class="img-responsive" alt="Image" style="width:150px; ">
                            </div>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group" style="text-align:center;">
                            <button type="submit" name="btn_add_write_catalog"
                                onclick="return check_content_add_write()" class="btn btn-primary text-center">Tạo
                                danh mục blog</button>

                        </div>

                    </div>


                </form>


            </div>
        </div>

    </div>