<?php 
    
    class databaseConnect 
    {
        public CONST MESSAGE = '<script>  alert("Không thể kết nối databa");</script>';
        public function connectDatabase(){
            try{
                $connect = new PDO('mysql:host=localhost; dbname=b15_23077682_vitoidep','nguyenah7294','b15_23077682');
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