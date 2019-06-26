<?php
  session_start();
  error_reporting(0);
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Vì tôi đẹp | Mỹ phẩm thiên nhiên</title>
  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="css/custome.css">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="css/facebook_messenger.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
 
  <script src="js/sweetjs.js"></script>
  <link rel="stylesheet" href="css/branch.css">
  <link rel="stylesheet" href="css/pagnigation.css">

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/lightbox.css" rel="stylesheet"> 
  <link href="css/main.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">

  <!-- add_fontawawe -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
	<!-- slide_main -->
  <link rel="stylesheet" type="text/css" href="plugins/slick-carousel/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="plugins/slick-carousel/slick/slick-theme.css"/>
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
 
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="js/ajax.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--  -->
<script>
  $(document).ready(function(){
    refresh();
  });
  function refresh(){
    setTimeout(function(){
     
      $("#auto").fadeOut('slow').load('../bbb.php').fadeIn('slow');
      refresh();
     
    }, 200);
  }
  </script>

<?php
  if(isset($infoProduct))
  {
    ?>
     <meta property="og:type" content="article" />
      <meta property="og:title" content="<?php echo $infoProduct->name_product;?>" />
      <meta property="og:url" content="http://vitoidep.vn/product-single.php?name=<?php echo $infoProduct->name_product_no_vietnamse;?>" />
      <meta property="og:description" content="<?php echo $infoProduct->name_product;?>" />
      <meta property="og:image" content="http://vitoidep.vn//images/product/<?php echo $infoProduct->image_product;?>" />
      <meta property="og:image:type" content="image/jpeg" />
      <meta property="og:image:type" content="image/png" />
      <meta property="og:image:width" content="1920" />
      <meta property="og:image:height" content="1024" />
      <meta property="article:author" content="https://www.facebook.com/nguyenanhhoang.7.2" />
    <?php
  }
  if(isset($infoPost))
  {
    ?>
     <meta property="og:type" content="article" />
      <meta property="og:title" content="<?php echo $infoPost->blog_name;?>" />
      <meta property="og:url" content="http://vitoidep.vn/blog-single.php?post=<?php echo $infoPost->viet_nam_title;?>" />
      <meta property="og:description" content="<?php echo $infoProduct->name_product;?>" />
      <meta property="og:image" content="http://vitoidep.vn/images/user_info/<?php echo $infoPost->image_blog;?>" />
      <meta property="og:image:type" content="image/jpeg" />
      <meta property="og:image:type" content="image/png" />
      <meta property="og:image:width" content="1920" />
      <meta property="og:image:height" content="1024" />
      <meta property="article:author" content="https://www.facebook.com/nguyenanhhoang.7.2" />
    <?php
  }
 
?>

