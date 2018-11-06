<?php
        require '../library/const.php';

        function getCurrentTime(){
            return date('Y-m-d H:i:s');
        }


        function checkUniqueAccount($pdo,$table,$atribute,$value){
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
         * Function use when get all record in datatable
         * @param pdo
         * @param tableName
         */
        function getAllRecord($pdo,$tableName){
            $sqlQuery= "SELECT * FROM $tableName";
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute();
            return $PDO->fetchAll(PDO::FETCH_OBJ);
        }

         /**
         * Function use when get all record in datatable follow a condition
         * @param pdo
         * @param tableName
         *  @param conditionName
         * @param value
         */
        function getRecordFollowCondition($pdo,$tableName,$conditionName,$value){
            $sqlQuery= "SELECT * FROM $tableName WHERE $conditionName = $value";
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute();
            return $PDO->fetchAll(PDO::FETCH_OBJ);
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
            try {
                $PDO->execute($paramQuery);
                return SUCCESS;
            }
            catch(PDOException $e){
               return FAIL_PROCESS;
            }
           
        }

     
			
		
    
?>