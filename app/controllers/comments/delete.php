<?php

include __DIR__ . '/../../models/Comment.php';
session_start();

if (isset($_GET["id"])) {
    $comment = new Comment();

    $comment->deleteComment($_GET["id"]);

    $_SESSION['success_message'] = 'comment deleted successfully!';

    header("Location:  /comments");
    exit();
}
