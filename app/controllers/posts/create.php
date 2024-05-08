<?php


include __DIR__ . '/../../models/Post.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if (!empty($title)  && !empty($content)) {


        $post = new Post();
        $post->createPost($title , $content, $user_id);

        $_SESSION['success_message'] = 'post create successfully!';

        header("Location:  /posts");
        exit();
    }else{
       
        $_SESSION['error_message'] = 'post not create successfully!';
        header("Location:  /posts");
        exit();

    }
}
