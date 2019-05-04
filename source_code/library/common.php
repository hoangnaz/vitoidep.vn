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
         * Get one record follow option codintion
         * @param pdo
         * @param tableName
         *  @param conditionName
         * @param value
         */
        function getOneRecordFollowCondition($pdo,$tableName,$conditionName,$value)
        {
            $sqlQuery= "SELECT * FROM $tableName WHERE $conditionName LIKE '".$value."'";
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute();
            return $PDO->fetch(PDO::FETCH_OBJ);
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
         * Function use when get all record in datatable follow a condition
         * @param pdo
         * @param tableName
         *  @param conditionName
         * @param value
         */
        function getAllRecordPanigation($pdo,$tableName,$conditionName,$value)
        {
            $sqlQuery= "SELECT * FROM $tableName WHERE $conditionName LIKE '".$value."";
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute();
            return $PDO->fetchAll(PDO::FETCH_OBJ);
        }


        /**
         * Use function when panigation with panigation
         * @param pdo
         * @param tableName
         *  @param conditionName
         * @param value
         */
        function getRecordFollowConditionPanigation($pdo, $sqlQuery)
        {
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
        function getRecordFollowConditionOrderBy($pdo,$tableName,$conditionName,$value,$orderBy,$valueOrder)
        {
            $sqlQuery= "SELECT * FROM $tableName WHERE $conditionName LIKE '".$value."'";
            $sqlQuery.= " ORDER BY ".$orderBy." ".$valueOrder;
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
        function getRecordLimitAndOrder($pdo,$tableName,$orderBy,$valueOrder, $number)
        {
            $sqlQuery= "SELECT * FROM $tableName ";
            $sqlQuery.= " ORDER BY ".$orderBy." ".$valueOrder." LIMIT 0,".$number;
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute();
            return $PDO->fetchAll(PDO::FETCH_OBJ);
        }

         /**
         * Function use when get all record in datatable follow a condition
         * support search
         * @param pdo
         * @param tableName
         *  @param conditionName
         * @param value
         */
        function getRecordConditionEqual($pdo,$tableName,$conditionName,$value)
        {
            $sqlQuery= "SELECT * FROM $tableName WHERE $conditionName = '".$value."'";
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute();
            return $PDO->fetchAll(PDO::FETCH_OBJ);
        }


        
        /**
         * Function use when get all record in datatable follow a condition
         * support search
         * @param pdo
         * @param tableName
         *  @param conditionName
         * @param value
         */
        function getRecordFollowConditionLike($pdo,$tableName,$conditionSearch)
        {
            $value=$conditionSearch["value"];
            $sqlQuery= "SELECT * FROM $tableName WHERE ".$conditionSearch['conditon']." LIKE '%".$value."%'";
            $PDO=$pdo->prepare($sqlQuery);
            $PDO->execute();
            return $PDO->fetchAll(PDO::FETCH_OBJ);
        }


        /**
         * @start start
         * @numberRecord numberRecord
         * 
         */

         function getPagnationRecord($pdo,$start,$numberRecord,$valueSearch)
         {
                $lstOrder=array("DESC","ASC");
                $order=$valueSearch['order'];
                if($valueSearch['order']=="HightToLow"){
                    $valueSearch['order']="DESC";
                }
                elseif($valueSearch['order']=="LowToHight"){
                    $valueSearch['order']="ASC";
                }
                $query="SELECT * FROM `product_info` WHERE `sub_catalog` LIKE '".$valueSearch['value']."' ";
                if(in_array($order,$lstOrder)){
                    $query.=" ORDER BY `name_product` ".$valueSearch['order'] ;
                }else{
                    $query.=" ORDER BY `price_product` ".$valueSearch['order'] ;
                }
                $query.="  LIMIT ".$start.",".$numberRecord;
              
                $PDO=$pdo->prepare($query);
                $PDO->execute();
                if($PDO->rowCount()>=1){
                    return $PDO->fetchAll(PDO::FETCH_OBJ);
                }
                return FAIL_PROCESS;
         }


          /**
         * @start start
         * @numberRecord numberRecord
         * 
         */

        function getPagnationHightLightAndStatus($pdo,$start,$numberRecord,$conditionSearch)
        {
                $lstOrder=array("DESC","ASC");
                $order=$conditionSearch['order'];
                if($conditionSearch['order']=="HightToLow"){
                    $conditionSearch['order']="DESC";
                }
                elseif($conditionSearch['order']=="LowToHight"){
                    $conditionSearch['order']="ASC";
                }
               $query="SELECT * FROM `product_info` WHERE ".$conditionSearch['conditon']." LIKE '".$conditionSearch['value']."' ";
               if(in_array($order,$lstOrder)){
                $query.=" ORDER BY `name_product` ".$conditionSearch['order'] ;
                }else{
                    $query.=" ORDER BY `price_product` ".$conditionSearch['order'] ;
                }
               $query.="  LIMIT ".$start.",".$numberRecord;
             
               $PDO=$pdo->prepare($query);
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
            elseif($file['size'] > 20971520){
                Return FAIL_MAX_FILE;
            }
            else{
                $name=$file['name'];
                $folder=$_SERVER['DOCUMENT_ROOT'].'/images/user_info/'.$folderName;
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


        /**
         * convert to vietnameses
         */
        function utf8convert($str) {

            if(!$str) return false;
    
            $utf8 = array(
    
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
    
        'd'=>'đ|Đ',
    
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
    
        'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
    
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
    
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
    
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    
                                            );
    
            foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
    
        return $str;
    
        }
        
        /**
         * convert to vietnamese with utf8
         */
        function utf8tourl($text){
            $text = strtolower(utf8convert($text));
            $text = str_replace( "ß", "ss", $text);
            $text = str_replace( "%", "", $text);
            $text = preg_replace("/[^_a-zA-Z0-9 -] /", "",$text);
            $text = str_replace(array('%20', ' '), '-', $text);
            $text = str_replace("----","-",$text);
            $text = str_replace("---","-",$text);
            $text = str_replace("--","-",$text);
        return $text;
        }
    
			
		
    
?>