<?php


session_start();
$post = new Post();


if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $user_id = $user->id;

    $posts = $post->getPostsByUserId($user_id);
} else {
    header("Location:  / ");
    exit();
}
