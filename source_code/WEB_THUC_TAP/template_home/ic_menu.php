<div class="container-fluid">
			<div id="menu">
				<div class="row">
					<nav class="navbar navbar-inverse">
					  <div class="container-fluid">
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>                        
					      </button>
		                   <div class="hidden-lg hidden-md" style="float:right;background-color:transparent; margin-top:10px; margin-bottom:8px; margin-right:30px; border:0px;">
					    	<a href="view_cart.php" style="color:#999;"><i class="fa fa-shopping-basket fa-2x" aria-hidden="true">		  <?php
			if($_SESSION["number_buy"]>0)
			{
				echo $_SESSION["number_buy"];
			}?>
            </i></a>
	
		                   </div>
					    </div>
					    <div class="collapse navbar-collapse" id="myNavbar">
					      <ul class="nav navbar-nav">
                          	<li class="hidden-xs hidden-sm"><a href="index.php">TRANG CHỦ</a></li>
					        <li class="hidden-lg hidden-md"><a href="index.php"><img src="Admin/Assert/logo/logo.png" class="img-responsive " alt="Image" width="160px;"></a></li>
					        <li><a href="sign_up.php">ĐĂNG KÝ</a></li>
                            
                            	<?php 
										if($_SESSION["info_customer"]["id_customer"]=="")
									{
								?>
										 <li><a href="user.php">THÔNG TIN TÀI KHOẢN</a></li>
							   <?php
                                    }
                                    else
                                    {
                                ?>
	                       			<li><a href="user.php">Xin chào ! <i class="fa fa-user-circle-o" aria-hidden="true">
                                    	<?php
                                        	echo $_SESSION["info_customer"]["fullname"];
										?>
                                    </i></a></li>
								<?php
                                }
                                ?>
                           
		                  
					      </ul>
					      <ul class="nav navbar-nav navbar-right">
					        <li><a href="view_cart.php"><span class="glyphicon glyphicon-shopping-cart"> </span> 
                              <?php
								if($_SESSION["number_buy"]>0)
								{
									echo $_SESSION["number_buy"];
								}?>
                            </a></li>
                            	<?php 
										if($_SESSION["info_customer"]["id_customer"]=="")
									{
								?>
							<li data-toggle="collapse" data-target="#myNavbar"><a href="login.php"><span class="glyphicon glyphicon-log-in">   </span> ĐĂNG NHẬP</a></li>
							   <?php
                                    }
                                    else
                                    {
                                ?>
	                                               		    
					        <li><a href="manipulation/pr_logout.php"><span class="glyphicon glyphicon-log-out">   </span>  ĐĂNG XUẤT</a></li>
								<?php
                                }
                                ?>
                            
                         
					      </ul>
					    </div>
					  </div>
					</nav>
				</div>
			</div>