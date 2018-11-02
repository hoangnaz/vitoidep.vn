<?php
        

        function getCurrentTime(){
            return date('Y-m-d H:i:s');
        }


        function check_unique_accout($pdo,$table,$atribute,$value){
            $sqlQuery= "SELECT * FROM $table WHERE $atribute LIKE '$value' ";
            $PDO=$pdo->prepare($sqlQuery);
			$PDO->execute();
            if( $PDO->rowCount() >= 1 )
            {
                return true;
            }
            return false;
        }


        /** 
        * Function is used when get one record in datatable
        *
        * @param  pdo 
        * @param  param 
        * @param  query 
        * @return result
        */
       
        function getOneRecord($pdo,$paramQuery,$sqlQuery){
            $PDO=$pdo->prepare($sqlQuery);
			$PDO->execute($paramQuery);
			return $PDO->fetch(PDO::FETCH_OBJ);
        }

        /** 
        * Function is used when get check login         *
        * @param  pdo 
        * @param  param 
        * @param  query 
        * @return result
        */
       
        function checkLogin($pdo,$paramQuery,$sqlQuery){
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute($paramQuery);
           
            if($PDO->rowCount()==1)
            {
                return getOneRecord($pdo,$paramQuery,$sqlQuery); 
            }
            else
            {
                return false;
            }
			
        }
        

        
        /** 
        * Function is used when get insert record in datatable
        *
        * @param  pdo 
        * @param  param 
        * @param  query 
        * @return result insert
        */
       
        function insertUpadeRecord($pdo,$paramQuery,$sqlQuery){
            $PDO=$pdo->prepare($sqlQuery);
			return $PDO->execute($paramQuery);
        }

     
			
		
    
?>