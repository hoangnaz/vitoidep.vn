<?php 
    
    class databaseConnect 
    {
        public CONST MESSAGE = '<script>  alert("Không thể kết nối databa");</script>';
        public function connectDatabase(){
            try{
                $connect = new PDO('mysql:host=localhost; dbname=sale_book_learning_tools','root','');
                $connect->query('set names "utf8"');
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connect;       
            }
            catch(PDOException $e){
                echo database::MESSAGE;
                
            }
        }
    } 
   

?>