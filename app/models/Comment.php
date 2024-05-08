<?php

class Comment
{

    private $db;

    public function __construct()
    {
        include_once __DIR__ . '/../database.php';
        $this->db = new Database();
    }


    public function getPostComments($post_id)
    {
        $sql = "SELECT c.*, u.* FROM comments c JOIN users u ON c.user_id = u.id WHERE c.post_id=?";
        $comments =  $this->db->query($sql, [$post_id])->all();
        return $comments;
    }


    public function createComment($comment, $user_id, $post_id)
    {
        $query = "INSERT INTO comments (comment, user_id , post_id) VALUES (?, ?, ?)";
        $params = [
            $comment,
            $user_id,
            $post_id
        ];

        // Execute the query using the query method
        $this->db->query($query, $params);
    }

    public function getCommentsByUserId($user_id)
    {
        $sql = "SELECT * from comments where user_id =?";
        $comments =  $this->db->query($sql, [$user_id])->all();
        return $comments;
    }


    public function  getCommentByCommentId($comment_id)
    {

        $sql = "SELECT * from comments where id =?";
        $comment =  $this->db->query($sql, [$comment_id])->findOrFail();
        return $comment;
    }


    public function editComment($comment_id, $comment)
    {

        $sql = "UPDATE comments SET  comment = ? WHERE id = ?";
        $params = [
            $comment,
            $comment_id 
        ];


        $this->db->query($sql, $params);
    }


    public function deleteComment($comment_id)
    {

        $sql = "DELETE FROM comments WHERE id = ?";
        $params = [
            $comment_id
        ];


        $this->db->query($sql, $params);
    }
}
