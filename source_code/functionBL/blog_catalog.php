<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/database/catalog_blog.php';

    class blogCatalog{
        function getListCatalog(){
            $blogCatalogDB = new blogCatalogtDB();
            $lstblogCatalog = $blogCatalogDB->getAllBlogCatalog();
            return $lstblogCatalog;
        }
    }
?>