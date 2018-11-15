<?php
	$number_customer=$ad_select->query_number_customer();
	$number_feedback=$ad_select->query_number_feedback();
	$number_order=$ad_select->query_number_order();
	$number_catalog=$ad_select->query_number_catalog();
	$feature_catalog=$ad_select->query_list_feature_catalog();
	$feature_provicer_publisher=$ad_select->query_list_feature_producer_publisher();
	
	
?>
 <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $number_feedback;?></div>
                                        <div>Phản hồi khách hàng!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="mn_feedback.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                     <i class="fa fa-archive fa-3x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $number_catalog;?></div>
                                        <div>Loại sản phẩm</div>
                                    </div>
                                </div>
                            </div>
                            <a href="mn_product.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                     <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo ($number_customer -1);?></div>
                                        <div>Tài khoản khách hàng!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="mn_customer.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                       <i class="fa fa-file-text-o fa-3x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $number_order;?></div>
                                        <div>Đơn hàng!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="mn_order.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Danh sách danh mục sản phẩm</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                <?php foreach($feature_catalog as $catalog)
								{
									?>
                                    <a href="#" class="list-group-item">
                                       <?php echo $catalog->catalog_name;?>
                                    </a>
                                  <?php 
								}
								?>
                                   
                                    
                                </div>
                                <div class="text-right">
                                    <a href="mn_catalog.php">Xem cụ thể<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Danh sách các nhà cung cấp</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php foreach($feature_provicer_publisher as $provicer_publisher)
								{
									?>
                                    <a href="#" class="list-group-item">
                                       <?php echo $provicer_publisher->	name_producer_publisher;?>
                                    </a>
                                  <?php 
								}
								?>
                                    
                                    
                                </div>
                                <div class="text-right">
                                    <a href="mn_supplier.php">Xem cụ thể<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>