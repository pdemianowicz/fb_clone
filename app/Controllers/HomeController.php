<?php

use App\Controllers\services\PostService;
use App\Database;
use App\Models\Comment;
use App\Models\User;

class HomeController
{
    public function index()
    {

        if (!isset($_SESSION['user']['id'])) {
            redirect('/login');
        }

        $postService = new PostService();
        $posts = $postService->showPosts();

        view('index.view.php', [
            'posts' => $posts,
        ]);

    }

    public function addPost()
    {
        $postService = new PostService();
        $posts = $postService->addPost();
    }

    public function deletePost()
    {
        $postService = new PostService();
        $posts = $postService->deletePost();
    }

    public function setLike()
    {
        $postService = new PostService();
        $posts = $postService->setLike();
    }

    public function loadComments()
    {
        $postId = $_GET['id'];
        $commentModel = new Comment(new Database());
        $userModel = new User(new Database());

        $comments = $commentModel->getMainComments($postId);

        foreach ($comments as &$comment) {
            $this->processComment($comment, $userModel, $commentModel);

            // dd($comments);
        }

        view('partials/comments/comments.php', [
            'comments' => $comments,
            'postId' => $postId,
            'avatar' => "./uploads/" . $_SESSION['user']['avatar'],
            'loginUser' => $_SESSION['user']['id'],
        ]);
    }

    private function processComment(&$comment, $userModel, $commentModel)
    {
        $comment['userName'] = $userModel->getUserName($comment['userId']);
        $comment['avatar'] = $userModel->getAvatar($comment['userId']);

        $replies = $commentModel->getRepliesComments($comment['commentId']);

        foreach ($replies as &$reply) {
            $this->processComment($reply, $userModel, $commentModel);
        }

        $comment['replies'] = $replies;
    }

    public function setComment()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['id'];
            $postId = $_POST['postId'];
            $content = trim($_POST['content']);

            if (!empty($content)) {
                $commentModel = new Comment(new Database());
                $commentModel->setComment($postId, $userId, $content);

                redirect('/');

                // echo json_encode(['success' => true]);
            } else {
                // echo json_encode(['success' => false, 'message' => 'Komentarz nie może być pusty!']);
            }
        } else {

            // echo json_encode(['success' => false, 'message' => 'Nieprawidłowe żądanie.']);
        }

    }

    public function deleteComment()
    {
        $commentId = $_POST['commentId'];
        $commentModel = new Comment(new Database());
        $result = $commentModel->deleteComment($commentId);

        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Komentarz został usunięty.',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Nie udało się usunąć komentarza.',
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
