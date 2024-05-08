<?php


include __DIR__ . '/../../models/Comment.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment_id = $_POST['comment_id'];
    $comment = $_POST['comment'];

    $c = new Comment();
    $c->editComment($comment_id, $comment);

    $_SESSION['success_message'] = 'comment updated successfully!';

    header("Location:  /comments");
    exit();
}
