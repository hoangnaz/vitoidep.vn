<?php
    error_reporting(1);
    require_once $_SERVER['DOCUMENT_ROOT'].'/database/blog_post.php';
	$blogPostDB = new blogPostDB();
	$listBlogPost = $blogPostDB->getAllBlogPost();
    $path = $_SERVER['DOCUMENT_ROOT'].'/images/user_info';
  
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <a class="btn btn-info" href='write_sub_add_write.php'>Thêm bài viết mới</a>

    </div>
    <div class="col-lg-12">
        <h2>Tạo bài viết mới</h2>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="80px">
                            <p class="text-center">Mã bài viết</p>
                        </th>
                        <th width="120px">
                            <p class="text-center">Tên bài viết</p>
                        </th>
                        <th width="120px">
                            <p class="text-center">Hình đại diện</p>
                        </th>
                        <th width="320px">
                            <p class="text-center">Mô tả tóm tắt</p>
                        </th>
                        <th width="20px">Đọc</th>
                        <th width="20px">Phê duyệt</th>
                        <th width="20px">Cập nhật</th>
                        <th width="20px">Xóa</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
										foreach($listBlogPost as $lstPost)
										{
									?>

                    <tr>
                        <td class="text-center"><?php echo $lstPost->blog_id;?></td>
                        <td><?php echo $lstPost->blog_name;?></td>
                        <td><img src="../images/user_info/<?php echo $lstPost->image_blog;?>" width="80px" class="img-responsive" alt="Image"></td>
                        <td>
                            <?php echo $lstPost->content_sumary;?>
                        </td>
                        <td>đọc </td>
                        <td></td>
                        <td></td>
                                            
                        <?php 
									   	if($lstPost->status==1)
										{
									   ?>
                        <td width="60px"><a href="javascript:void(0)"
                                onClick="delete_catalog_blog(<?php echo $lstPost->blog_id;?>,0)"><i
                                    class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        <?php
										}
										else if($lstPost->status==0)
										{
										?>
                        <td width="60px"><a href="javascript:void(0)"
                                onClick="recyecle_catalog_blog(<?php echo $lstPost->blog_id;?>,1)"><i
                                    class="fa fa-recycle" aria-hidden="true"></i></a></td>
                        <?php
										}
										 ?>
                    </tr>
                    <?php
										
									}
									 ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

</div>