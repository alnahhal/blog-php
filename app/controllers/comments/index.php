<?php
include __DIR__ . '/../../models/Comment.php';
session_start();
if (isset($_SESSION['user'])) {
     $user = $_SESSION['user'];
     $c = new Comment();
   $comments =  $c->getCommentsByUserId($user->id);
     
     
}else {
    header("Location:  / ");
    exit();
}