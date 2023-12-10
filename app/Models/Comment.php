<?php

namespace App\Models;

class Comment
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getMainComments($postId)
    {
        return $this->db->query("SELECT * FROM Comments WHERE postId = :postId AND path = CONCAT('/', :postId)", [
            'postId' => $postId,
        ])->get();
    }

    public function getRepliesComments($commentId)
    {
        return $this->db->query("SELECT * FROM Comments WHERE path LIKE CONCAT('%/', :commentId)", [
            'commentId' => $commentId,
        ])->get();
    }

    public function getCommentsCount($postId)
    {
        $result = $this->db->query("SELECT COUNT(commentId) as totalComments FROM comments WHERE postId = :postId", [
            'postId' => $postId,
        ])->find();

        $total = $result["totalComments"];

        return $this->formatCommentCount($total);
    }

    private function formatCommentCount($count)
    {
        if ($count <= 0) {
            return null;
        } elseif ($count === 1) {
            return "$count komentarz";
        } elseif ($count > 1 && $count < 5) {
            return "$count komentarze";
        } else {
            return "$count komentarzy";
        }
    }

    public function setComment($postId, $userId, $content)
    {
        $path = '/' . $postId;

        return $this->db->query("INSERT INTO Comments (postId, userId, path, content) VALUES (:postId, :userId, :path, :content)", [
            'postId' => $postId,
            'userId' => $userId,
            'path' => $path,
            'content' => $content,
        ]);
    }

    public function deleteComment($commentId)
    {
        return $this->db->query("DELETE FROM comments WHERE commentId = :commentId", [
            'commentId' => $commentId,
        ]);

    }

}
