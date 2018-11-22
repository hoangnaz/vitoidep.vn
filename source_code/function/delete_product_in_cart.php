<?php
    session_start();
    $id_product=$_GET['id'];
    unset($_SESSION["product_cart"][$id_product]);
    $locationHref=$_SERVER["HTTP_REFERER"];
    echo  $locationHref;
   
?>