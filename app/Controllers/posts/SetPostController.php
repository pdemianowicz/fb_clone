<?php

namespace App\Controllers\posts;

use App\Database;
use App\Models\Post;

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
