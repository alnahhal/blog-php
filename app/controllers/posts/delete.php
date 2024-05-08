<?php

include __DIR__ . '/../../models/Post.php';
session_start();

if (isset($_GET["id"])) {
    $post = new Post();

    $post->deletePost($_GET["id"]);

    $_SESSION['success_message'] = 'post delete succeefully!';

    header("Location:  /posts");
    exit();
}
