<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Blog.php';
require_once BASE_DIR . '/app/config/config.php';

class BlogController extends BaseController
{

    public function list($queryParams)
    {
        $blogList = Blog::getPaginatedBlogs();

        $data = compact('blogList');
        $this->render(
            'blog/list.php',
            $data
        );
    }

    public function detail($queryParams)
    {
        $blogDetail = Blog::getBlogByBlogId($queryParams['Blog_ID']);
        $blogComments = Blog::getBlogCommentsByBlogId($queryParams['Blog_ID']);

        $this->render(
            'blog/detail.php',
            compact('blogDetail', 'blogComments')
        );
    }

    public function edit($queryParams)
    {
        $blogInfo = Blog::getBlogByBlogId($queryParams['Blog_ID']);

        $this->render(
            'blog/edit.php',
            compact('blogInfo'),
            false
        );
    }

    public function add($queryParams)
    {
        $this->render(
            'blog/add.php',
            [],
            false
        );
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'Blog' => $_POST['Blog'],
                'SID' => $_POST['SID'],
                'user_id' => $_POST['user_id'],
            ];

            $success = Blog::blogSave($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/blog/add?message=Blog+Saved+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/blog/add?message=Blog+Save+Failed');
            }
            exit();
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'Blog' => $_POST['Blog'],
                'Date' => $_POST['Date'],
                'Blog_ID' => $_POST['Blog_ID']
            ];

            $success = Blog::updateBlog($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/blog/edit?CID=' . $data['CID'] . '&message=Blog+Updated+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/blog/edit?CID=' . $data['CID'] . '&message=Blog+Update+Failed');
            }
            exit();
        }
    }

    public function deleteConfirm($queryParams) {
        $blogInfo = Blog::getBlogByBlogId($queryParams['Blog_ID']);
        $this->render(
            'blog/delete.php',
            compact('blogInfo'),
            false
        );

    }
    

    public function deleteExecute()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'Blog_ID' => $_POST['Blog_ID']
            ];

            $success = Blog::deleteBlog($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/blog/delete-confirm?CID=' . $data['CID'] . '&message=Blog+Deleted+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/blog/delete-confirm?CID=' . $data['CID'] . '&message=Blog+Delete+Failed');
            }
            exit();
        }
    }

}
