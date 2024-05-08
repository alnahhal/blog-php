<?php

require __DIR__ . '/../models/User.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];

    $user = new User();



    if ($remember) {
        $key = "abcsdfsdggsd";
        $hashed_username = openssl_encrypt($username, "aes-256-cbc", $key);
        setcookie("rememberMe",  $hashed_username, time() + (30 * 24 * 60 * 60), "/"); // 30 days   
    }

    $result = $user->userLogin($username, $password);

    if ($result) {
        header("Location:  /profile ");
        exit();
    } else {
        $_SESSION['error_message'] = 'Invalid username or password';
        header("Location:  /login ");
        exit();
    }
}
