<?php


include __DIR__ . '/../../models/Comment.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (!isset($_SESSION['user'])) {
        header("Location:  /login");
        exit();
    }

    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];
    $user = $_SESSION['user'];

    $c = new Comment();
    $c->createComment($comment, $user->id, $post_id);
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();



    // echo '<pre>';
    // print_r($user);
    // echo '</pre>';
}
