<?php
error_reporting(1);
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/blog_post.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/catalog_blog.php';
$blogPostDB = new blogPostDB();
$listBlogPost = $blogPostDB->getAllBlogPost();
$catalogBlogDB = new blogCatalogtDB();
$listCatalogBlog = $catalogBlogDB->getAllBlogCatalog();
$path = $_SERVER['DOCUMENT_ROOT'] . '/images/user_info';

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
                  <th width="20px">Sửa</th>
                  <th width="20px">Xóa</th>
               </tr>
            </thead>
            <tbody>
               <?php
               foreach ($listBlogPost as $post) {
                  ?>
                  <tr>
                     <td class="text-center"><?php echo $post->blog_id; ?></td>
                     <td><?php echo $post->blog_name; ?></td>
                     <td><img src="../images/user_info/<?php echo $post->image_blog; ?>" width="80px" class="img-responsive" alt="Image"></td>
                     <td>
                        <?php echo $post->content_sumary; ?>
                     </td>

                     <td> <a data-toggle="modal" href='#read<?php echo $post->blog_id; ?>'><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <div class="modal fade" id="read<?php echo $post->blog_id; ?>">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title text-center text-warning"><?php echo $post->blog_name; ?>
                                    </h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="col-xs-12 col-sm-12 col-lg-12 form_info_input">
                                       <?php echo $post->content_full; ?>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                 </div>
                              </div>
                           </div>
                        </div>

                     </td>
                     <td> <a data-toggle="modal" href='#edit<?php echo $post->blog_id; ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <div class="modal fade" id="edit<?php echo $post->blog_id; ?>">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title text-center text-warning">CẬP NHẬT BÀI VIẾT
                                    </h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="col-xs-12 col-sm-12 col-lg-12 form_info_input">
                                       <form action="ad_manipulation/blog/update_blog.php?blogId=<?php echo $post->blog_id;?>" enctype="multipart/form-data" method="POST" role="form" enctype="multipart/form-data">
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data">
                                             <div class="form-group">
                                                <div class="col-lg-2">
                                                   <label for="catalog">Tiều đề :</label>
                                                </div>
                                                <div class="col-lg-10">
                                                   <input type="text" maxlength="300" name="txt_blog_name" class="txt_blog_name form-control" id="txt_blog_name" required value='<?php echo $post->blog_name; ?>'>
                                                </div>

                                             </div>

                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                                <div class="col-lg-2">
                                                   <label for="describle_catalog">Mô tả:</label>
                                                </div>
                                                <div class="col-lg-10">

                                                   <textarea type="text" maxlength="500" name="txt_describle_blog" class="txt_describle_blog form-control" id="txt_describle_blog<?php echo $post->blog_id; ?>" required>
															 	      <?php echo  $post->content_sumary; ?>
															      </textarea>
                                                   <script>
                                                      CKEDITOR.replace('txt_describle_blog<?php echo $post->blog_id; ?>');
                                                   </script>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                                <div class="col-lg-2">
                                                   <label for="content_blog">Nội dung:</label>
                                                </div>
                                                <div class="col-lg-10">
                                                   <textarea type="text" maxlength="10000" name="txt_content_blog" class="txt_content_blog form-control" id="txt_content_blog<?php echo $post->blog_id; ?>" required>
                                                   <?php echo  $post->content_full; ?>
                                                </textarea>
                                                   <script>
                                                      CKEDITOR.replace('txt_content_blog<?php echo $post->blog_id; ?>');
                                                   </script>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group">
                                                <div class="col-lg-2">
                                                   <label for="content_blog">Danh mục blog:</label>
                                                </div>
                                                <div class="col-lg-10">

                                                   <select name="sl_blog_catalog" id="sl_blog_catalog" class="sl_blog_catalog form-control" required="required">
                                                      <?php
                                                      foreach ($listCatalogBlog as $key => $value) {
                                                         ?>
                                                         <option value="<?php echo  $value->id_catalog; ?>" <?php echo $value->id_catalog==$post->blog_catalog?'selected':'' ?>>
                                                            <?php echo  $value->name_blog; ?></option>
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
                                                   <input type="file" class="form-control" name="img_content" id="img_content"  onclick="return auto_load_img()">
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                   <img  id="img_avt" class="img-responsive" alt="Image" src="../images/user_info/<?php echo $post->image_blog;?>" style="width:150px; ">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                             <div class="form-group" style="text-align:center;">
                                                <button type="submit" name="btn_update_post" onclick="return check_content_add_write()" class="btn btn-primary text-center">Cập nhật bài viết</button>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </td>
                     <?php
                     if ($post->status == 1) {
                        ?>
                        <td width="60px"><a href="javascript:void(0)" onClick="delete_blog('<?php echo $post->blog_id; ?>',0)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                     <?php
                  } else if ($post->status == 0) {
                     ?>
                        <td width="60px"><a href="javascript:void(0)" onClick="recyecle_blog('<?php echo $post->blog_id; ?>',1)"><i class="fa fa-recycle" aria-hidden="true"></i></a></td>
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


<!-- Modal view bài viết -->