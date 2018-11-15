<?php

	include_once("admin/database/select_data.php");
	$us_select=new select_data();
	$lst_catalog=$us_select->query_list_catalog();
	
	
	//print_r($lst_custom_pagination);
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 general_content">
	 		
	 			<div id="content">
			 		<div class="col-xs-12 col-sm-12 col-lg-11 col-lg-offset-0" >
				 			<div class="row">
					 			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 			<div id="list_menu">
                                    <?php
                                    	foreach($lst_catalog as $lst_ct)
										{
											if($lst_ct->status==0)
											{
									?>
						 				<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
						 					<a href="list.php?catalog=<?php echo $lst_ct->id_catalog_product;?>">
							 					<div class="menu_new">
							 						<p class="text-center text-warning"><b><?php echo $lst_ct->catalog_name;?></b></p>
							 					</div>
							 				</a>	
						 				</div>
                                        <?php
											}
										}
										?>
						 				
						 			</div>
						 		</div>
						 	</div>		