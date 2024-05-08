<?php


class Post
{
    private $db;

    public function __construct()
    {
        include_once __DIR__ . '/../database.php';
        $this->db = new Database();
    }
    public function getAllPosts()
    {

        $query = "select * from posts ";

    

        $posts =  $this->db->query($query)->all();
        return $posts;
    }



    public function getPostsByUserId($id)
    {


        $query = "select * from posts where user_id= ?";


        $posts =  $this->db->query($query, [$id])->all();
        return $posts;
    }

    public function getPostByPostId($id)
    {


        $query = "select * from posts where id= ?";

      

        $posts =  $this->db->query($query, [$id])->find();
        return $posts;
    }


    public function editPost($post_id, $title, $content)
    {

        $sql = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
        $params = [
            $title,
            $content,
            $post_id
        ];
     

        $this->db->query($sql, $params);
    }


    public function deletePost($post_id)
    {

        $sql = "DELETE FROM posts WHERE id = ?";
        $params = [
            $post_id
        ];


        $this->db->query($sql, $params);
    }

    public function createPost($title , $content , $user_id)
    {

        $query = "INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)";
        $params = [
           $title,
            $content,
            $user_id
        ];
      
        // Execute the query using the query method
        $this->db->query($query, $params);
    }
}
