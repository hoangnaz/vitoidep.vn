<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/database/blog_post.php';
    class blogPostBL{
        function getBlogPost($blogPostId){
            $blogDB = new blogPostDB();
            $blogDetail = $blogDB->getInfoBlogPost($blogPostId);
            return $blogDetail;
        }
        function updateView($blogPostId){
            $blogDB = new blogPostDB();
            $result = $blogDB->viewOfBlog($blogPostId);
            return $result;
        }
        function topFiveView(){
            $blogDB = new blogPostDB();
            $result = $blogDB->getFiveView();
            return $result;
        }
    }
?>

