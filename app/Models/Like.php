<?php

namespace App\Models;

class Like
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getLikes($targetId, $targetType)
    {
        return $this->db->query("SELECT COUNT(*) as likeCount FROM Likes WHERE targetId = :targetId AND targetType = :targetType", [
            'targetId' => $targetId,
            'targetType' => $targetType,
        ])->get();
    }

    public function userLiked($targetId, $targetType, $userId)
    {
        return $this->db->query("SELECT COUNT(*) as likeCount FROM Likes WHERE targetId = :targetId AND targetType = :targetType AND userId = :userId", [
            'targetId' => $targetId,
            'targetType' => $targetType,
            'userId' => $userId,
        ])->get();
    }

    public function setLike($targetId, $targetType, $userId)
    {
        $userLiked = $this->userLiked($targetId, $targetType, $userId);
        $userLiked = $userLiked[0]["likeCount"] > 0 ? "true" : "false";

        if ($userLiked === "true") {
            $query = "DELETE FROM Likes WHERE targetId = :targetId AND targetType = :targetType AND userId = :userId";
        } else {
            $query = "INSERT INTO likes (targetId, targetType, userId) VALUES (:targetId, :targetType, :userId);";
        }

        return $this->db->query($query, [
            'targetId' => $targetId,
            'targetType' => $targetType,
            'userId' => $userId,
        ])->get();
    }

}
