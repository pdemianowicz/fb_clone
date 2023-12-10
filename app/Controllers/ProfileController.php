<?php

use App\Controllers\services\PostService;
use App\Database;
use App\Models\User;

class ProfileController
{
    public function index()
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? null;

        if (!$id || !is_numeric($id)) {
            redirect('/');
        }

        $userModel = new User(new Database());
        $userData = $userModel->getUserDataById($id);
        $postService = new PostService();
        $posts = $postService->showPosts($id);

        view('profile.view.php', [
            'user' => $userData,
            'posts' => $posts,
        ]);

    }

    private function showProfile()
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            redirect('/');
        }

        $userData = $this->userModel->getUserDataById($id);

        return $userData;
    }

    public function avatar()
    {
        $userId = $_SESSION['user']['id'];

        if (isset($_POST['submit']) && !empty($_FILES['image']['name'])) {

            $filename = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = 'uploads/' . $filename;
            $_SESSION['user']['avatar'] = $filename;

            $userModel = new User(new Database());
            $userModel->setAvatar($filename, $userId);

            move_uploaded_file($tempname, $folder);

            // echo "<img src='$filename'";

            redirect('/profile?id=' . $userId);
        }

        if (isset($_POST['delete_avatar'])) {

            $filename = 'avatar.jpg';

            $_SESSION['user']['avatar'] = $filename;

            $userModel = new User(new Database());
            $userModel->deleteAvatar($filename, $userId);

            redirect('/profile?id=' . $userId);
        }

        redirect('/profile?id=' . $userId);

    }

    public function deleteAvatar()
    {
        if (isset($_POST['delete_avatar'])) {
            $userId = $_SESSION['user']['id'];
            $filename = 'avatar.jpg';

            $_SESSION['user']['avatar'] = $filename;

            $userModel = new User(new Database());
            $userModel->deleteAvatar($filename, $userId);

            redirect('/profile?id=' . $userId);
        }
    }

    public function bg()
    {
        $userId = $_SESSION['user']['id'];

        if (isset($_POST['submit']) && !empty($_FILES['image']['name'])) {
            $filename = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = 'uploads/' . $filename;

            $userModel = new User(new Database());
            $userModel->setBg($filename, $userId);

            move_uploaded_file($tempname, $folder);

            redirect('/profile?id=' . $userId);
        }

        if (isset($_POST['delete_avatar'])) {
            $userId = $_SESSION['user']['id'];
            $filename = '';

            $userModel = new User(new Database());
            $userModel->deleteBg($filename, $userId);

            redirect('/profile?id=' . $userId);
        }

        redirect('/profile?id=' . $userId);

    }
}
