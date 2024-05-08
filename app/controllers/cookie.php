<?php

include  __DIR__ . '/../models/User.php';

session_start();

$user = new User();

if (isset($_COOKIE['rememberMe'])) {

    $hashed_username = $_COOKIE['rememberMe'];
    $key = "abcsdfsdggsd";
    $username = openssl_decrypt($hashed_username, "aes-256-cbc", $key);
    $u = $user->getUserByUsername($username);

    $_SESSION['user'] = $u;
}
