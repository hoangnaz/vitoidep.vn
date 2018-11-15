<?php
	
	$lst_feedback=$ad_select->query_list_feedback();
	$count=count($lst_feedback);
	$limit=9;
	$posision=$ad_page->findStart($limit);
	$pag=$ad_page->findPages($count,$limit);
	$current=$_GET["page"];
	$pagination=$ad_page->pageList($current,$pag);
	$lst_feedback_pagination=$ad_select->query_list_feedback_page($posision,$limit);
	//print_r($lst_custom_pagination);
?>
<div class="row">
                   <?php
                   	foreach($lst_feedback_pagination as $fb)
					{
						$alert_color=($fb->id_feedback) % 6;
						switch($alert_color)
						{
							case 0:
							{
								$color="panel-default";
								 break;
							}
							case 1:
							{
								$color="panel-warning";
								 break;
							}
							case 2:
							{
								$color="panel-info";
								 break;
								
							}
							case 3:
							{
								$color="panel-success";
								 break;
							}
							case 4:
							{
								$color="panel-primary";
								 break;
							}
								case 5:
							{
								$color="panel-muted";
								 break;
							}
						}
				   ?>
                    <div class="col-lg-4">
                       <div class="panel <?php echo $color;?>">
                          <div class="panel-heading"><?php echo $fb->fullname;?></div>
                          <div class="panel-body" height="600px">
                          <p><i><b>Email:</b></i> <?php echo $fb->email;?></p>
                          <p><i><b>Ngày gửi:</b></i> <?php echo date("d-m-Y",strtotime($fb->date_send_fb));?></p>
                          <p><i><b>Nội dung:</b></i></p>
                          <p><?php echo $fb->content_feedback;?></p>
                          </div>
                        </div>
                    </div>
                    <?php
					}
					?>
                    
                   
                </div>
                  <div class="col-lg-12">
                        <div id="pagination_page">
							<?php
                            
                                echo $pagination;
                            ?>
                        </div>
                    </div>