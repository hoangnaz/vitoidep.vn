<?php
        require 'const.php';

        function getCurrentTime()
        {
            return date('Y-m-d H:i:s');
        }

        function checkUniqueAccount($pdo,$table,$atribute,$value)
        {
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
        function getAllRecord($pdo,$tableName)
        {
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
        function getRecordFollowCondition($pdo,$tableName,$conditionName,$value)
        {
            $sqlQuery= "SELECT * FROM $tableName WHERE $conditionName LIKE '".$value."'";
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute();
            return $PDO->fetchAll(PDO::FETCH_OBJ);
        }


        /**
         * @start start
         * @numberRecord numberRecord
         * 
         */

         function getPagnationRecord($pdo,$start,$numberRecord,$catalogId)
         {
                $query="SELECT * FROM `product_info` WHERE `sub_catalog` LIKE '".$catalogId."' ";
                $query.="  LIMIT ".$start.",".$numberRecord;
              
                $PDO=$pdo->prepare($query);
    ;
                $PDO->execute();
                if($PDO->rowCount()>=1){
                    return $PDO->fetchAll(PDO::FETCH_OBJ);
                }
                return FAIL_PROCESS;
         }

        /** 
        * Function is used when get one record in datatable
        *
        * @param  pdo 
        * @param  param 
        * @param  query 
        * @return result
        */
       
        function getOneRecord($pdo,$paramQuery,$sqlQuery)
        {
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute($paramQuery);
            if($PDO->rowCount()==1){
                return $PDO->fetch(PDO::FETCH_OBJ);
            }
            return FAIL_PROCESS;
			
        }

        /** 
        * Function is used when get check login         *
        * @param  pdo 
        * @param  param 
        * @param  query 
        * @return result
        */
       
        function checkLogin($pdo,$paramQuery,$sqlQuery)
        {
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
       
        function insertUpadeRecord($pdo,$paramQuery,$sqlQuery)
        {
            $PDO=$pdo->prepare($sqlQuery);
            try {
                $PDO->execute($paramQuery);
                return SUCCESS;
            }
            catch(PDOException $e){
               return FAIL_PROCESS;
            }
           
        }

           /** 
        * Check rank of customer
        *
        * @param  point 
        * @return result insert
        */
       
        function rankUser($point)
        {
            if($point > 2000){
                Return "Vàng";
            }
            else if($point > 1000 && $point < 2000 ){
                Return "Bạc";
            }
            else if($point < 1000 ){
                Return "Đồng";
            }
            else{
                Return "VIP";
            }
        }


        function uploadImage($file,$folderName)
        {
            $arrayCheckExtension=array('png','jpeg','jpg');
            $extension=pathinfo($file['name'],PATHINFO_EXTENSION);
            
            if(!in_array($extension,$arrayCheckExtension)){
                Return FAIL_EXTENSION_FILE;
            }
            elseif($file['size'] > 100000){
                Return FAIL_MAX_FILE;
            }
            else{
                $name=$file['name'];
                $folder='../images/user_info/'.$folderName;
                if(!is_dir($folder))
                {
                    mkdir($folder);
                }
              
                $resultUpload=move_uploaded_file($file['tmp_name'],$folder.'/'.$name);
                if( $resultUpload){
                    return SUCCESS;
                }else{
                    return FAIL_PROCESS;
                }
            }
        }
     
			
		
    
?>