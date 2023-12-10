<?php

use App\Database;
use App\Validator;

class SessionController
{
    public function index()
    {
        view('session/create.view.php');

    }

    public function store()
    {

        $email = $_POST['email'];
        $password = $_POST['pwd'];

        if (!Validator::email($email)) {
            $errors['email'] = "Adres e-mail jest niepoprawny.";
        }

        if (!Validator::string($password)) {
            $errors['password'] = 'Hasło musi mieć przynajmniej 6 znaków, 1 wielką literę i 1 znak specjalny.';
        }

        if (!empty($errors)) {
            return view('session/create.view.php', [
                'errors' => $errors,
            ]);
        }

        function attempt($email, $password)
        {
            $db = new Database();
            $user = $db->query('SELECT * FROM users WHERE email = :email', [
                'email' => $email,
            ])->find();

            if ($user) {
                if (password_verify($password, $user['pwd'])) {
                    login($user);

                    return true;
                } else {
                    return 'invalid_password';
                }
            } else {
                return 'invalid_email';
            }
        }

        function login($user)
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

        $signedIn = attempt($email, $password);

        if ($signedIn === true) {
            redirect('/');

        } else {
            $errors = [];
            if ($signedIn === 'invalid_email') {
                $errors['email'] = 'Nieprawidłowy login!';

            } elseif ($signedIn === 'invalid_password') {
                $errors['password'] = 'Nieprawidłowe hasło!';
            }

            return view('session/create.view.php', [
                'errors' => $errors,
            ]);

        }

    }

    public function destroy()
    {
        session_destroy();
        unset($_SESSION['user']['id']);

        redirect('/login');

    }

}
