<?php


include __DIR__ . '/../../models/Post.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $post = new Post();
    $post->editPost($post_id, $title, $content);

    $_SESSION['success_message'] = 'record update succeefully!';

    header("Location:  /posts");
    exit();
}
