<?php

require_once "../app/Database.php";

class Authenticator
{
    public function attempt($email, $password)
    {
        $db = new Database($config);
        $user = $db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email,
        ])->find();

        if ($user) {
            if (password_verify($password, $user['pwd'])) {
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['userId'],
            'email' => $user['email'],
            'firstName' => $user['firstName'],
            'lastName' => $user['lastName'],
            'avatar' => $user['avatar'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
