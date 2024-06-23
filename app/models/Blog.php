<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Blog {

    public static function getAllBlogs()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT blog.Blog, blog.SID, blog.user_id, blog.Date, Blog_ID, SName, SReg, SPortrait, SMName FROM blog INNER JOIN s_info ON blog.SID=s_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMIDE blog.deleted = 0 ORDER BY Blog_ID desc";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $blogsData = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $blogsData;
    }


    public static function getBlogsCount() {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT COUNT(Blog_ID) as total_blogs FROM blog WHERE deleted = 0";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $blog = $stmt->get_result();
            $stmt->close();
            $blogData = $blog->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $blogData['total_blogs'];
    }

    
    public static function getPaginatedBlogs() {
        $totalBlogs = self::getBlogsCount();
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT blog.Blog, blog.SID, blog.user_id, blog.Date, Blog_ID, SName, SReg, SPortrait, SMName FROM blog INNER JOIN s_info ON blog.user_id=s_info.user_id INNER JOIN sm_info ON s_info.SMID=sm_info.SMID WHERE blog.deleted = 0 ORDER BY Blog_ID desc";
        $recordPerPage = 5;
        $pagination = new Page();
        $pagination->set_page_data(BASE_URL.'/blog/list', 1, $totalBlogs, $recordPerPage, 0, true, true, true);
        $paginationQuery = $pagination->get_limit_query($qry);
        $paginationStmt = $connection->prepare($paginationQuery);
        if ($paginationStmt) {
            $paginationStmt->execute();
            $paginationResult = $paginationStmt->get_result();
            $paginationStmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        $paginationData = [
            'pagination_nav' => $pagination->get_page_nav('', true),
            'blogs' => $paginationResult
        ];

        return $paginationData;
    }

    public static function getBlogByBlogId($blogId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT DISTINCT blog.blog, blog.SID, blog.Date, blog.Blog_ID, SName, SReg, SPortrait, SMName FROM blog INNER JOIN s_info ON blog.SID=s_info.SID INNER JOIN sm_info ON s_info.SMID=sm_info.SMID where Blog_ID=? AND blog.deleted = 0";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $blogId);
            $stmt->execute();
            $blogResult = $stmt->get_result();
            $stmt->close();
            $blogDetail = $blogResult->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $blogDetail;
    }

    public static function getBlogCommentsByBlogId($blogId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT SName, SPortrait, Comment FROM comments INNER JOIN s_info ON comments.user_id=s_info.user_id WHERE Blog_ID=?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("s", $blogId);
            $stmt->execute();
            $blogComments= $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $blogComments;
    }
    public static function blogSave($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
    
        $qry = "INSERT INTO blog (SID, Blog, user_id) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "ssi",
                $data['SID'],
                $data['Blog'],
                $data['user_id']
            );
    
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            return false;
        }
    }

    public static function updateBlog($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE blog SET 
                Blog=?,
                Date=?

                WHERE Blog_ID=?";
                
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "ssi",
                $data['Blog'],
                $data['Date'],

                $data['Blog_ID']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

    public static function deleteBlog($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE blog SET 
                deleted=1

                WHERE Blog_ID=?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "i",
                $data['Blog_ID']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

    public static function saveComment($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
    
        $qry = "INSERT INTO comments (user_id, SID, Blog_ID, Comment) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "iiis",
                $data['user_id'],
                $data['user_id'],
                $data['blog_id'],
                $data['comment']
            );
    
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            return false;
        }
    }

}
