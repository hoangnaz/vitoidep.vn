<?php
    session_start();
    error_reporting(0);
    $id_product=$_GET['id'];
    unset($_SESSION["product_cart"][$id_product]);
    $locationHref=$_SERVER["HTTP_REFERER"];
    echo  $locationHref;
   
?>