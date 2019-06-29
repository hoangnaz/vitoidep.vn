<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/connect_database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/library/common.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/entities/blog_post.php';

class blogPostDB extends databaseConnect
{
    const TABLE_NAME = 'blog';
    const CONDITION_ID_BLOG = 'blog_id';
    const CONDITION_CATELOG_BLOG = 'blog_catalog';
    const STATUS_ON = 1;
    const STATUS_DELETE = 0;
    const NUMBER_VIEW = 0;
    const DESC = "DESC";
    const ASC = "ASC";
    const CONDITON_NUMBERVIEW = "number_view";

    // GEt all blog_post have pagination
    public function getAllBlogPostPanigation($pos = -1, $limit = -1, $value)
    {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE (`status` = 0) AND (`blog_catalog` = '" . $value . "') ORDER BY `date_update` DESC";
        if ($pos >= 0 && $limit > 0) {
            $query .= " limit $pos,$limit";
        }
        $pdo = parent::connectDatabase();
        return getRecordFollowConditionPanigation($pdo, $query);
    }

    // get all blog post follow conditon
    public function getAllBlogFollowCondition($value)
    {
        $value = $value . "' AND  `status` = 0 ";
        $pdo = parent::connectDatabase();
        return getAllRecordPanigation($pdo, self::TABLE_NAME, self::CONDITION_CATELOG_BLOG, $value);
    }

    //Get all product in table

    public function getAllBlogPost()
    {
        $pdo = parent::connectDatabase();
        return getAllRecord($pdo, self::TABLE_NAME);
    }

    // Get information one catalog blog
    public function getInfoBlogPost($value)
    {
        $pdo = parent::connectDatabase();
        return getOneRecordFollowCondition($pdo, self::TABLE_NAME, self::CONDITION_ID_BLOG, $value);
    }

    //get top 5 view blog
    public function getFiveView()
    {
        $pdo = parent::connectDatabase();
        return getRecordLimitAndOrder(
            $pdo,
            self::TABLE_NAME,
            self::CONDITON_NUMBERVIEW,
            self::DESC,
            5
        );
    }


    //insert Blog Catalog
    public function insertBlogPost($blogPost)
    {
        $pdo = parent::connectDatabase();
        $chkIdBlogPost = checkUniqueAccount($pdo, self::TABLE_NAME, self::CONDITION_ID_BLOG, $blogPost->getIdBlog());
        if ($chkIdBlogPost == true) {
            return 1000;
        }

        $query = "INSERT INTO blog VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $paramQuery = array(
            $blogPost->getIdBlog(),
            $blogPost->getVietNamTitle(),
            $blogPost->getBlogName(),
            $blogPost->getBlogCatalog(),
            $blogPost->getImageBlog(),
            $blogPost->getContenSumary(),
            $blogPost->getContentFull(),
            getCurrentTime(),
            getCurrentTime(),
            $blogPost->getCreateUser(),
            $blogPost->getNumberView(),
            0
        );
        return insertUpadeRecord($pdo, $paramQuery, $query);
    }

    //update Blog Catalog
    public function updateBlog($blog, $blogID)
    {
        $pdo = parent::connectDatabase();
        $chkIdBlog = checkUniqueAccount($pdo, self::TABLE_NAME, self::CONDITION_ID_BLOG, $blog->getIdBlog());
        if (!$chkIdBlog == true) {
            return 1000;
        }
 
        $blogInfo = $this->getInfoBlogPost($blogID);
        if ($blog->getImageBlog() == '') {
           $blog->setImageBlog($blogInfo->image_blog);
        }
        
        $query = "UPDATE `blog` SET `blog_name`=?,`image_blog`=?,`content_sumary`=?,`content_full`=?,`date_update`=?,`create_user`= ? WHERE `blog_id` = ?";
        $paramQuery = array(
            $blog->getBlogName(),
            $blog->getImageBlog(),
            $blog->getContenSumary(),
            $blog->getContentFull(),
            getCurrentTime(),
            $blog->getCreateUser(),
            $blogID
        );
        return insertUpadeRecord($pdo, $paramQuery, $query);
    }

    //delete Blog Catalog
    public function deleteBlog($blogID, $status)
    {
        $pdo = parent::connectDatabase();
        $chkIdBlogCatalog = checkUniqueAccount($pdo, self::TABLE_NAME, self::CONDITION_ID_BLOG, $blogID);
        if (!$chkIdBlogCatalog == true) {
            return 1000;
        }

        $query = "UPDATE `blog` SET `status`=?, `date_update`=? WHERE `blog_id` = ?";
        $paramQuery = array(
            $status,
            getCurrentTime(),
            $blogID
        );
        return insertUpadeRecord($pdo, $paramQuery, $query);
    }

    // update View Catalog Blog
    public function viewOfBlog($blogId)
    {
        $pdo = parent::connectDatabase();
        $chkIdBlogCatalog = checkUniqueAccount($pdo, self::TABLE_NAME, self::CONDITION_ID_BLOG, $blogId);
        if (!$chkIdBlogCatalog == true) {
            return 1000;
        }
        $query = "UPDATE blog SET number_view = number_view + 1 WHERE blog_id = ?";
        $paramQuery = array(
            $blogId
        );
        return insertUpadeRecord($pdo, $paramQuery, $query);
    }
}
