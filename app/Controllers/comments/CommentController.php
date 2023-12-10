<?php

namespace App\Controllers\comments;

use App\Controllers\comments\CommentController;
use App\Database;
use App\Models\Comment;
use App\Models\User;

class CommentController
{
    private $commentModel;
    private $userModel;

    public function __construct($commentModel, $userModel)
    {
        $this->commentModel = $commentModel;
        $this->userModel = $userModel;
    }

    public function showComments($postId)
    {
        $comments = $this->commentModel->getMainComments($postId);

        foreach ($comments as &$comment) {
            $comment['userName'] = $this->userModel->getUserName($comment['userId']);
            $comment['avatar'] = $this->userModel->getAvatar($comment['userId']);
            $comment['loginUser'] = 6;
        }

        return $comments;
    }
}

$data = json_decode(file_get_contents('php://input'), true);
$postId = $data["postId"];

$commentModel = new Comment(new Database());
$userModel = new User(new Database());
$commentController = new CommentController($commentModel, $userModel);
$comments = $commentController->showComments($postId);

require BASE_PATH . 'views/partials/comments.php';

// view('comments.php', [
//     'comments' => $comments,
// ]);

// dd($comments);
// $postId = 29;
