<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/database/connect_database.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/library/common.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/entities/catalog_blog.php';
  
    class blogCatalogtDB extends databaseConnect
    {
        const TABLE_NAME = 'blog_catalog';
        const CONDITION_ID_CATALOG = 'id_catalog';
        const STATUS_ON = 1;
        const STATUS_DELETE = 0;
      
        //  const CONDITION_NAME_VN = 'name_product_no_vietnamse';
        //  const CONDITION_GET_ONE_PRODUCT = 'id_product';
        
         //Get all product in table

		public function getAllBlogCatalog()
		{
            $pdo=parent::connectDatabase();
			return getAllRecord($pdo,self::TABLE_NAME);
			
        }

        // Get information one catalog blog
        public function getInfoBlogCatalog($value){
            $pdo=parent::connectDatabase();
			return getOneRecordFollowCondition($pdo,self::TABLE_NAME,self::CONDITION_ID_CATALOG,$value);
        }

       
     
      //insert Blog Catalog
      public function insertCatalogBlog($blogCatalog)
      {
          $pdo=parent::connectDatabase();
          $chkIdBlogCatalog = checkUniqueAccount($pdo,self::TABLE_NAME,self::CONDITION_ID_CATALOG,$blogCatalog->getIDCatalog());	
          if($chkIdBlogCatalog == true)
          {
              return 1000;
          }
          
          $query="INSERT INTO blog_catalog VALUES (?,?,?,?,?,?,?)";
          $paramQuery = array(
              $blogCatalog->getIDCatalog(),
              $blogCatalog->getNameCatalogBlog(),
              $blogCatalog->getDescriptionCatalogBlog(),
              $blogCatalog->getSumaryCatalogBlog(),
              self::STATUS_ON,
              getCurrentTime(),
              getCurrentTime()
          );
          return insertUpadeRecord($pdo,$paramQuery,$query);	
      }

      //update Blog Catalog
      public function updateCatalogBlog($blogCatalog, $blogCatalogID)
      {
          $pdo=parent::connectDatabase();
          $chkIdBlogCatalog = checkUniqueAccount($pdo,self::TABLE_NAME,self::CONDITION_ID_CATALOG,$blogCatalog->getIDCatalog());	
          if(!$chkIdBlogCatalog == true)
          {
              return 1000;
          }
          $catalogBlogInfo = $this->getInfoBlogCatalog($blogCatalogID);
          if( $blogCatalog->getNameCatalogBlog() == ''){
            $blogCatalog->setNameCatalogBlog($blogCatalog['name_blog']);
          }
          if( $blogCatalog->getDescriptionCatalogBlog() == ''){
            $blogCatalog->setDescriptionCatalogBlog($catalogBlogInfo['description']);
          }
          if( $blogCatalog->getSumaryCatalogBlog() == ''){
            $blogCatalog->setSumaryCatalogBlog($catalogBlogInfo['name_sumary']);
          }
          $query = "UPDATE `blog_catalog` SET `name_blog`=?,`description`=?,`name_sumary`=?,`updated_at`=? WHERE `id_catalog` = ?";
          $paramQuery = array(
              $blogCatalog->getNameCatalogBlog(),
              $blogCatalog->getDescriptionCatalogBlog(),
              $blogCatalog->getSumaryCatalogBlog(),
              getCurrentTime(),
              $blogCatalogID
          );
          return insertUpadeRecord($pdo,$paramQuery,$query);	
      }

      //delete Blog Catalog
      public function deleteCatalogBlog($blogCatalogID, $status)
      {
          $pdo=parent::connectDatabase();
          $chkIdBlogCatalog = checkUniqueAccount($pdo,self::TABLE_NAME,self::CONDITION_ID_CATALOG,$blogCatalogID);	
          if(!$chkIdBlogCatalog == true)
          {
              return 1000;
          }
         
          $query = "UPDATE `blog_catalog` SET `status`=?, `updated_at`=? WHERE `id_catalog` = ?";
          $paramQuery = array(
              $status,
              getCurrentTime(),
              $blogCatalogID
          );
          return insertUpadeRecord($pdo,$paramQuery,$query);	
      }


	}

   
    //print_r($pro->getProductPagnition(0,10,'son_gac'));
    // count($pro->getAllProduct());
    // print_r($pro->getProductFollowOption('status_product',2));
// if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header('WWW-Authenticate: Basic realm="Vui lòng nhập thông tin username và password"');
//    header('HTTP/1.0 401 Unauthorized');
//    echo 'Text to send if user hits Cancel button';
//    exit;
// } else {
//    $username = $_SERVER['PHP_AUTH_USER'];
//    $password = $_SERVER['PHP_AUTH_PW'];
//    if($username == 'ten_xac_thuc' && $password == 'mk_xac_thuc') {
//       echo 'Đăng nhập ứng dụng thành công';
//    }else {
// 	header('WWW-Authenticate: Basic realm="Vui lòng nhập thông tin username và password"');
// 	header('HTTP/1.0 401 Unauthorized');
//    }
//}
	
?>