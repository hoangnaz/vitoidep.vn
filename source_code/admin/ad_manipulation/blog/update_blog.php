<?php
    session_start();
    error_reporting(1);
    include($_SERVER['DOCUMENT_ROOT'].'/library/common.php');
    include($_SERVER['DOCUMENT_ROOT'].'/entities/blog_post.php');
    include($_SERVER['DOCUMENT_ROOT'].'/database/blog_post.php');
    if(isset($_POST["btn_update_post"])){
        $blogPost = new blogPost();
        $blogID = $_GET['blogId'];
        $blogPost->setIdBlog($blogID);
        $blogPost->setBlogName($_POST['txt_blog_name']);
        $blogPost->setBlogCatalog($_POST['sl_blog_catalog']);
        $blogPost->setContenSumary($_POST['txt_describle_blog']);
        $blogPost->setContentFull($_POST['txt_content_blog']);
        $blogPost->setCreateUser($_SESSION["info_staff"]['fullname']);
        $file=$_FILES['img_content'];
        if($file['name']==''){
            $resultUploadFile = SUCCESS;
        }else{
            $path='avatar_post';
            $resultUploadFile=uploadImage($file,$path);
        }
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
                if($file['name']!=''){
                    $imageSource=$path.'/'.$file['name'];
                    $blogPost->setImageBlog($imageSource);
                }else{
                    $blogPost->setImageBlog('');
                }
              
                echo $updateBlogPost=$blogPostDB->updateBlog($blogPost, $blogID);

                if($updateBlogPost == 200)
                {
                    unset($_SESSION["blog_content"]);
                    echo "<script>alert('Cập nhật thành công bài viết mới.')</script>";
                    echo "<script>window.location='../../write_blog_mn.php'</script>";
                }
                else if($updateBlogPost == 1000)
                {
                    $_SESSION["blog_content"]= array("txt_blog_name"=>$blogTitle,"txt_describle_blog"=>$_POST['txt_describle_blog'],"txt_content_blog"=>$_POST['txt_content_blog']);
                    echo "<script>alert('Không tồn tại bài viết này')</script>";
                    echo "<script>window.location='../../write_blog_mn.php'</script>";
                }
                else
                {
                    $_SESSION["blog_content"]= array("txt_blog_name"=>$blogTitle,"txt_describle_blog"=>$_POST['txt_describle_blog'],"txt_content_blog"=>$_POST['txt_content_blog']);
                    echo "<script>alert('Quá trình cập nhật  bài viết thất bại.')</script>";
                    echo "<script>window.location='../../write_blog_mn.php'</script>";
                    
                }
            }
        
        }
    }
?>