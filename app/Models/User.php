<?php

namespace App\Models;

class User
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    // GET METHODS
    public function getUserName($userId)
    {
        $result = $this->db->query("SELECT firstName,lastName FROM users WHERE userId = :id", [
            'id' => $userId,
        ])->find();

        return $result['firstName'] . ' ' . $result['lastName'];
    }

    public function getAvatar($userId)
    {
        $result = $this->db->query("SELECT avatar FROM users WHERE userId = :id", [
            'id' => $userId,
        ])->find();

        return $this->getAvatarPath($result['avatar']);
    }

    public function getUserDataById($userId)
    {
        $userData = $this->db->query("SELECT * FROM users WHERE userId = :id", [
            'id' => $userId,
        ])->find();

        if (!$userData) {
            redirect('/');
        }

        $user = [
            'userId' => $userData['userId'],
            'userName' => $userData['firstName'] . ' ' . $userData['lastName'],
            'gender' => $userData['gender'],
            'birthday' => $userData['birthday'],
            'regDate' => $userData['regDate'],
            'avatar' => $this->getAvatarPath($userData['avatar']),
            'bg' => $this->getBackgroundStyle($userData['bg']),
        ];

        return $user;
    }

    private function getAvatarPath($avatar)
    {
        $path = './uploads/';
        return !empty($avatar) ? $path . $avatar : $path . 'default-avatar.jpg';
    }

    private function getBackgroundStyle($background)
    {
        $path = "./uploads/" . $background;
        return !empty($background) ? 'style="background-image: url(' . $path . ');"' : "";
    }

    public function checkUserExists($email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $email,
        ])->find();
    }

    // SET METHODS
    public function setAvatar($filename, $userId)
    {
        $this->db->query("UPDATE users SET avatar = :filename WHERE userId = :userId", [
            'filename' => $filename,
            'userId' => $userId,
        ]);
    }

    public function deleteAvatar($filename, $userId)
    {
        $this->db->query("UPDATE users SET avatar = :filename WHERE userId = :userId", [
            'filename' => $filename,
            'userId' => $userId,
        ]);
    }

    public function setBg($filename, $userId)
    {
        $this->db->query("UPDATE users SET bg = :filename WHERE userId = :userId", [
            'filename' => $filename,
            'userId' => $userId,
        ]);
    }

    public function deleteBg($filename, $userId)
    {
        $this->db->query("UPDATE users SET bg = :filename WHERE userId = :userId", [
            'filename' => $filename,
            'userId' => $userId,
        ]);
    }

    public function register($data = [])
    {
        return $this->db->query('INSERT INTO users (firstName, lastName, email, pwd, gender, birthday)
          VALUES(:firstName, :lastName, :email, :pwd, :gender, :birthday)', [
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'pwd' => password_hash($data['pwd'], PASSWORD_DEFAULT),
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
        ]);
    }

    //Login user
    public function login($nameOrEmail, $password)
    {
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if ($row == false) {
            return false;
        }

        $hashedPassword = $row->user_password;
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //Reset Password
    public function resetPassword($newPwdHash, $tokenEmail)
    {
        $this->db->query('UPDATE users SET user_password=:pwd WHERE user_email=:email');
        $this->db->bind(':pwd', $newPwdHash);
        $this->db->bind(':email', $tokenEmail);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // CRUD OPERATIONS
    public function create()
    {

    }

    public function read()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
