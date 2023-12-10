<?php

namespace App\Controllers\posts;

use App\Database;
use App\Models\Post;

class PostController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function showPosts($userId = null)
    {
        $posts = $userId ? $this->model->getPosts($userId) : $this->model->getPosts();

        foreach ($posts as &$post) {
            $userInfo = $this->model->getUserInfo($post['userId']);
            $post['firstName'] = $userInfo['firstName'];
            $post['lastName'] = $userInfo['lastName'];
            $post['avatar'] = $userInfo['avatar'];

            $postImages = $this->model->getPostImages($post['postId']);
            if (!empty($postImages)) {
                $post['image'] = $postImages['image'];
            }

        }
        return $posts;
    }

    public function addPost()
    {

        $userId = $_SESSION['user']['id'];
        $content = trim($_POST['content']);
        $image = $_FILES['image'];

        $postModel = new Post(new Database());
        $parentId = $postModel->setPost($userId, $content);

        if ($image['error'] === UPLOAD_ERR_OK) {

            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "uploads/" . $filename;

            $postModel->setPostImage($parentId, $filename, $tempname, $folder);
        }

        redirect('/');

    }

}
