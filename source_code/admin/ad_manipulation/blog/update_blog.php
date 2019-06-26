<?php
    session_start();
    error_reporting(1);
    include($_SERVER['DOCUMENT_ROOT'].'/library/common.php');
    include($_SERVER['DOCUMENT_ROOT'].'/entities/blog_post.php');
    include($_SERVER['DOCUMENT_ROOT'].'/database/blog_post.php');
    if(isset($_POST["btn_add_write_catalog"])){
        $blogPost = new blogPost();
        $blogTitle = $_POST['txt_blog_name'];
        $blogID = utf8tourl(utf8convert($blogTitle));
        $blogPost->setIdBlog($blogID);
        $blogPost->setBlogName($blogTitle);
        $blogPost->setVietNamTitle($blogID);
        $blogPost->setBlogCatalog($_POST['sl_blog_catalog']);
        $blogPost->setContenSumary($_POST['txt_describle_blog']);
        $blogPost->setContentFull($_POST['txt_content_blog']);
        $blogPost->setCreateUser($_SESSION["info_staff"]['fullname']);
        $file=$_FILES['img_content'];
        $path='avatar_post';
        $resultUploadFile=uploadImage($file,$path);
        switch ($resultUploadFile){
            case FAIL_EXTENSION_FILE:{
            echo  "Chưa đúng định dạng file";
            break;
            }
        
            case FAIL_MAX_FILE:{
                echo "File chứa dung lượng quá lớn;";
                break;
            }
            default:{
                $blogPostDB = new  blogPostDB();
                $imageSource=$path.'/'.$file['name'];
                $blogPost->setImageBlog($imageSource);
                $insertBlogPost=$blogPostDB->insertBlogPost($blogPost);
                if($insertBlogPost == 200)
                {
                    unset($_SESSION["blog_content"]);
                    echo "<script>alert('Thêm thành công bài viết mới.')</script>";
                    echo "<script>window.location='../write_blog_mn.php'</script>";
                }
                else if($insertBlogPost == 1000)
                {
                    $_SESSION["blog_content"]= array("txt_blog_name"=>$blogTitle,"txt_describle_blog"=>$_POST['txt_describle_blog'],"txt_content_blog"=>$_POST['txt_content_blog']);
                    echo "<script>alert('Tên blog này đã tồn tại')</script>";
                    echo "<script>window.location='../write_sub_add_write_template.php'</script>";
                }
                else
                {
                    $_SESSION["blog_content"]= array("txt_blog_name"=>$blogTitle,"txt_describle_blog"=>$_POST['txt_describle_blog'],"txt_content_blog"=>$_POST['txt_content_blog']);
                    echo "<script>alert('Quá trình thêm  bài viết thất bại.')</script>";
                    echo "<script>window.location='../write_sub_add_write_template.php'</script>";
                    
                }
            }
        
        }
    }
?>