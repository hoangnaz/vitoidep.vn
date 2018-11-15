<?php
	
	$lst_catalog=$ad_select->query_list_sub_catalog();
	$count=count($lst_catalog);
	$limit=3;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$lst_catalog_pagination=$ad_select->query_list_sub_catalog_page($posision,$limit);
?>
  <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a class="btn btn-info"  href='sub_add_sub_catalog.php'>Tạo danh mục con</a>
            
        </div>
        <div class="col-lg-12">
            <h2>Danh sách danh mục con</h2>
            <div class="table-responsive">
                    <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="120px"><p class="text-center">Mã danh mục con</p></th>
                            <th width="250px"><p class="text-center">Tên danh mục con</p></th>
                            <th><p class="text-center">Mô tả</p></th>
                            <th  width="300px" colspan="2" ><p class="text-center">Tác vụ</p></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                            foreach($lst_catalog_pagination as $lst_cat)
                            {
                        ?>
                        
                        <tr>
                            <td class="text-center"><?php echo $lst_cat->sub_catalog_id;?></td>
                            <td class="text-center"><?php echo $lst_cat->sub_catalog_name;?></p></td>
                            <td class="text-center"><?php echo $lst_cat->sub_catalog_describe;?></td>
                            
                           
                            
                                <td width="60px">
                                <a  data-toggle="modal" href='#cata<?php echo $lst_cat->sub_catalog_id;?>'> <i class="fa fa-pencil-square-o text-danger" aria-hidden="true"></i></a>
                                <div class="modal fade" id="cata<?php echo $lst_cat->sub_catalog_id;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title text-center text-warning">CẬP NHẬT DANH MỤC</h4>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="col-xs-12 col-sm-12  col-lg-12 form_info_input">
                                                        <form action="ad_manipulation/up_catalog.php?id=<?php echo $lst_cat->sub_catalog_id;?>&image=<?php echo $lst_cat->image_catalog;?>" method="POST" role="form" enctype="multipart/form-data">
                                                        
                                                        
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input_login_data" >
                                                            <div class="form-group">
                                                                <div class="col-lg-3">
                                                                    <label for="catalog">Danh mục:</label>
                                                                </div>
                                                                <div class="col-lg-19">
                                                            
                                                                        <input type="text" name="txt_catalog" class="form-control" id="catalog"  required value="<?php echo $lst_cat->sub_catalog_name;?>">
                                                                </div>
                                                            
                                                            </div>
                                                        
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group">
                                                                <div class="col-lg-3">
                                                                    <label for="describle_catalog">Mô tả:</label>
                                                                </div>
                                                                <div class="col-lg-9">
                                                            
                                                                        <textarea type="text" name="txt_describle_catalog" class="form-control" id="txt_describle_catalog<?php echo $lst_cat->sub_catalog_id;?>"  ><?php echo $lst_cat->sub_catalog_describe;?></textarea>
                                                                                                <script>    CKEDITOR.replace( 'txt_describle_catalog<?php echo $lst_cat->sub_catalog_id;?>' );</script>
                                                                </div>
                                                            
                                                            </div>
                                                        
                                                        </div>
                                                        
                                                       
                                                    

                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <div class="form-group" style="text-align:center;">
                                                                    <button type="submit" name="btn_update_catalog" class="btn btn-primary text-center">Cập nhật danh mục</button>

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
                            if($lst_cat->status==0)
                            {
                            ?>
                                <td width="60px"><a href="javascript:void(0)" onClick="delete_catalog(<?php echo $lst_cat->id_catalog_product;?>,1)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                <?php
                            }
                            else if($lst_cat->status!=0)
                            {
                            ?>
                            <td width="60px"><a href="javascript:void(0)" onClick="recyecle_catalog(<?php echo $lst_cat->id_catalog_product;?>,0)"><i class="fa fa-recycle" aria-hidden="true"></i></a></td>
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
                <div class="col-lg-12">
                    <div id="pagination_page">
                        <?php
                        
                            echo $pagination;
                        ?>
                    </div>
            </div>
        </div>
        
    </div>