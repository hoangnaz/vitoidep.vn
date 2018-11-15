<?php
	error_reporting(0);
	session_start();
      
 
  if($_SESSION["info_staff"]["fullname"]!="")
	{
		header("location:index.php");
	}      
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login form</title>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <div class="login">
    <h1>ĐĂNG NHẬP</h1>

    <form class="form" method="post" action="ad_manipulation/ad_login.php">

      <p class="field">
        <input type="text" name="user_name" placeholder="Tài khoản" required/>
        <i class="fa fa-user"></i>
      </p>

      <p class="field">
        <input type="password" name="password" placeholder="Mật khẩu" required/>
        <i class="fa fa-lock"></i>
      </p>

      <p class="submit"><input type="submit" name="login_btn" value="ĐĂNG NHẬP"></p>


    </form>
  </div> <!--/ Login-->


  
</body>
</html>
