<?php
   error_reporting(1);
   include($_SERVER['DOCUMENT_ROOT'].'/database/catalog_blog.php');
   $lst_catalog_pagination=$ad_select->get_list_write_catalog();
   $catalogBlogDB = new blogCatalogtDB();
   
   
   ?>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <a class="btn btn-info" href='blog_sub_add_blog_catalog.php'>Tạo danh mục bài viết</a>
   </div>
   <div class="col-lg-12">
      <h2>Danh sách danh mục bài viết</h2>
      <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th width="120px">
                     <p class="text-center">Mã danh mục bài viết</p>
                  </th>
                  <th width="250px">
                     <p class="text-center">Tên danh mục</p>
                  </th>
                  <th>
                     <p class="text-center">Mô tả</p>
                  </th>
                  <th width="150px">Sửa danh mục blog</th>
                  <th width="150px">Xóa danh mục blog </th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  foreach($lst_catalog_pagination as $lst_cat)
                  {
                  ?>
               <tr>
                  <td class="text-center"><?php echo $lst_cat->id_catalog;?></td>
                  <td><?php echo $lst_cat->name_blog;?></td>
                  <td><?php echo $lst_cat->description;?></td>
                  <td width="60px">
                     <a data-toggle="modal" href='#cata<?php echo $lst_cat->id_catalog;?>'> <i
                        class="fa fa-pencil-square-o text-danger" aria-hidden="true"></i></a>
                     <div class="modal fade" id="cata<?php echo $lst_cat->id_catalog;?>">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                 <h4 class="modal-title text-center text-warning">CẬP NHẬT DANH MỤC BÀI VIẾT
                                 </h4>
                              </div>
                              <div class="modal-body">
                                 <div class="col-xs-12 col-sm-12  col-lg-12 form_info_input">
                                    <form
                                       action="ad_manipulation/blog_upadte_blog_catalog.php?idCatalogBlog=<?php echo $lst_cat->id_catalog;?>"
                                       method="POST" role="form" enctype="multipart/form-data">
                                       <?php
                                          $catalogBlogInfo = $catalogBlogDB->getInfoBlogCatalog($lst_cat->id_catalog);
                                          
                                          ?>
                                       <div
                                          class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data">
                                          <div class="form-group">
                                             <div class="col-lg-3">
                                                <label for="catalog">Tên dannh mục catalog blog:</label>
                                             </div>
                                             <div class="col-lg-9">
                                                <input type="text" maxlength="30"
                                                   name="txt_catalog_blog_name"
                                                   class="form-control txt_catalog_blog_name"
                                                   id="txt_catalog_blog_name" required
                                                   value='<?php echo  $catalogBlogInfo->name_blog;?>'>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                             <div class="col-lg-3">
                                                <label for="describle_catalog">Mô tả danh mục
                                                blog:</label>
                                             </div>
                                             <div class="col-lg-9">
                                                <textarea type="text" maxlength="1000"
                                                   name="txt_describle_catalog_blog"
                                                   class="txt_describle_catalog_blog form-control"
                                                   id="txt_describle_catalog_blog<?php echo $lst_cat->id_catalog;?>"
                                                   required><?php echo  $catalogBlogInfo->description;?></textarea>
                                                <script>
                                                   CKEDITOR.replace(
                                                       'txt_describle_catalog_blog<?php echo $lst_cat->id_catalog;?>'
                                                   );
                                                </script>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group">
                                             <div class="col-lg-3">
                                                <label for="describle_catalog">Tóm tắt danh mục
                                                blog:</label>
                                             </div>
                                             <div class="col-lg-9">
                                                <textarea type="text" maxlength="300"
                                                   name="txt_sumary_catalog_blog"
                                                   class="txt_sumary_catalog_blog form-control"
                                                   id="txt_sumary_catalog_blog<?php echo $lst_cat->id_catalog;?>"
                                                   required><?php echo  $catalogBlogInfo->name_sumary;?></textarea>
                                                <script>
                                                   CKEDITOR.replace(
                                                       'txt_sumary_catalog_blog<?php echo $lst_cat->id_catalog;?>'
                                                   );
                                                </script>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <div class="form-group" style="text-align:center;">
                                             <button type="submit" name="btn_update_write_catalog"
                                                onclick="return check_catalog_blog_update('<?php echo $lst_cat->id_catalog;?>')"
                                                class="btn btn-primary text-center">Cập nhật danh mục
                                             blog</button>
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
                     if($lst_cat->status==1)
                     {
                     ?>
                  <td width="60px"><a href="javascript:void(0)"
                     onClick="return delete_catalog_blog('<?php echo $lst_cat->id_catalog;?>',0)"><i
                     class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                  <?php
                     }
                     else if($lst_cat->status==0)
                     {
                     ?>
                  <td width="60px"><a href="javascript:void(0)"
                     onClick="recyecle_catalog_blog('<?php echo $lst_cat->id_catalog;?>',1)"><i
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