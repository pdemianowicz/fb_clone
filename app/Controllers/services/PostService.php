<?php

namespace App\Controllers\services;

use App\Database;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;

class PostService
{

    public function showPosts($userId = null)
    {
        $postModel = new Post(new Database());
        $posts = $userId ? $postModel->getPosts($userId) : $postModel->getPosts();

        foreach ($posts as &$post) {
            $userInfo = $postModel->getUserInfo($post['userId']);
            $post['firstName'] = $userInfo['firstName'];
            $post['lastName'] = $userInfo['lastName'];
            $post['avatar'] = $userInfo['avatar'];
            $post['likes'] = $this->getLike($post['postId'], 'post');
            $post['userLiked'] = $this->userLiked($post['postId'], 'post', $_SESSION['user']['id']);
            $post['commentsCount'] = $this->getCommentsCount($post['postId']);

            // dd($post['userLiked']);

            $postImages = $postModel->getPostImages($post['postId']);
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
            $filename = $image["name"];
            $tempname = $image["tmp_name"];
            $folder = "uploads/" . $filename;

            $postModel->setPostImage($parentId, $filename);

            move_uploaded_file($tempname, $folder);
        }

        redirect('/');
    }

    public function deletePost()
    {

        $postId = $_GET['id'];
        $postModel = new Post(new Database());
        $postModel->deletePost($postId);

        $postImages = $postModel->getPostImages($postId);
        if (!empty($postImages)) {
            $postModel->deletePostImage($postId);
        }

        // $url = $_SERVER['REQUEST_URI'];
        // if (urlIs('/')) {
        redirect('/');

        // } else {
        //     redirect($url);
        // }

    }

    public function getLike($targetId, $targetType)
    {
        $likeModel = new Like(new Database());
        $result = $likeModel->getLikes($targetId, $targetType);

        if (!$result[0]['likeCount']) {
            return;
        }
        return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16"><defs><linearGradient id="a" x1="50%" x2="50%" y1="0%" y2="100%"><stop offset="0%" stop-color="#18AFFF"/><stop offset="100%" stop-color="#0062DF"/></linearGradient><filter id="c" width="118.8%" height="118.8%" x="-9.4%" y="-9.4%" filterUnits="objectBoundingBox"><feGaussianBlur in="SourceAlpha" result="shadowBlurInner1" stdDeviation="1"/><feOffset dy="-1" in="shadowBlurInner1" result="shadowOffsetInner1"/><feComposite in="shadowOffsetInner1" in2="SourceAlpha" k2="-1" k3="1" operator="arithmetic" result="shadowInnerInner1"/><feColorMatrix in="shadowInnerInner1" values="0 0 0 0 0 0 0 0 0 0.299356041 0 0 0 0 0.681187726 0 0 0 0.3495684 0"/></filter><path id="b" d="M8 0a8 8 0 00-8 8 8 8 0 1016 0 8 8 0 00-8-8z"/></defs><g fill="none"><use fill="url(#a)" xlink:href="#b"/><use fill="black" filter="url(#c)" xlink:href="#b"/><path fill="white" d="M12.162 7.338c.176.123.338.245.338.674 0 .43-.229.604-.474.725a.73.73 0 01.089.546c-.077.344-.392.611-.672.69.121.194.159.385.015.62-.185.295-.346.407-1.058.407H7.5c-.988 0-1.5-.546-1.5-1V7.665c0-1.23 1.467-2.275 1.467-3.13L7.361 3.47c-.005-.065.008-.224.058-.27.08-.079.301-.2.635-.2.218 0 .363.041.534.123.581.277.732.978.732 1.542 0 .271-.414 1.083-.47 1.364 0 0 .867-.192 1.879-.199 1.061-.006 1.749.19 1.749.842 0 .261-.219.523-.316.666zM3.6 7h.8a.6.6 0 01.6.6v3.8a.6.6 0 01-.6.6h-.8a.6.6 0 01-.6-.6V7.6a.6.6 0 01.6-.6z"/></g></svg> ' . $result[0]['likeCount'];
    }

    public function userLiked($targetId, $targetType, $userId)
    {

        $likeModel = new Like(new Database());
        $result = $likeModel->userLiked($targetId, $targetType, $userId);

        return $result[0]["likeCount"] > 0 ? "true" : "false";
    }

    public function setLike()
    {
        $userId = $_SESSION['user']['id'];
        $targetId = $_POST['postId'];
        $targetType = $_POST["type"];

        $likeModel = new Like(new Database());
        $result = $likeModel->setLike($targetId, $targetType, $userId);

        echo $this->getLike($targetId, $targetType);
    }

    public function getCommentsCount($postId)
    {
        $commentModel = new Comment(new Database());
        return $commentModel->getCommentsCount($postId);
    }

}
