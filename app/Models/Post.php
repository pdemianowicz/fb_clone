<?php

namespace App\Models;

class Post
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getPosts($userId = null)
    {
        if ($userId !== null) {
            return $this->db->query("SELECT * FROM posts WHERE userId = :userId ORDER BY postId DESC", [
                'userId' => $userId,
            ])->get();
        }
        return $this->db->query("SELECT * FROM posts ORDER BY postId DESC")->get();
    }

    public function setPost($userId, $content)
    {
        $this->db->query("INSERT INTO posts (userId, content) VALUES (:userId, :content)", [
            'userId' => $userId,
            'content' => $content,
        ]);

        // return $this->db->lastInsertId();
        return $this->db->connection->lastInsertId();
    }

    public function setPostImage($parentId, $filename)
    {
        $this->db->query("INSERT INTO images (parentId, image) VALUES (:parentId, :filename)", [
            'parentId' => $parentId,
            'filename' => $filename,
        ]);
    }

    public function getUserInfo($userId)
    {
        return $this->db->query("SELECT * FROM users WHERE userId = :id", [
            'id' => $userId,
        ])->find();
    }

    public function getPostImages($postId)
    {
        return $this->db->query("SELECT * FROM images WHERE parentId = :parentId", [
            'parentId' => $postId,
        ])->find();
    }

    public function deletePostImage($postId)
    {
        return $this->db->query("DELETE FROM images WHERE parentId = :postId", [
            'postId' => $postId,
        ]);
    }

    public function deletePost($postId)
    {
        return $this->db->query("DELETE FROM posts WHERE postId = :postId", [
            'postId' => $postId,
        ]);
    }
}
