<?php
	class database
	{
			public function conect_data() {
        	try
        	{
            $connect = new PDO('mysql:host=localhost; dbname=sale_book_learning_tools','root','');
            $connect->query('set names "utf8"');
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			     return $connect;
        	}
       		catch(PDOException $e)
       		{
		   exit('<p class="text-center text-danger">Kết nối cơ sở dữ liệu thất bại. Vui lòng thử lại</p>');
			}
    	}
	}
?>