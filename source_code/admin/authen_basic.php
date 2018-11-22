<?php
     if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="Vui lòng nhập thông tin username và password"');
        header('HTTP/1.0 401 Unauthorized');
        exit;
      } else {
        $username = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];
        if($username == 'hoangna' && $password == '123') {
          header("location:login.php");
        }else {
        header('WWW-Authenticate: Basic realm="Vui lòng nhập thông tin username và password"');
        header('HTTP/1.0 401 Unauthorized');
        }
      }
?>