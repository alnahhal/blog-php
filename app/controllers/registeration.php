<?php

require __DIR__ . '/../models/User.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if ($_POST['password'] !==  $_POST['retype_password']) {

    $_SESSION['error_message'] = 'password and retype password are not identical';
    header("Location:  /register ");
    exit();

  } else {

    $user = new User();
    $username =  $user->userRegister($_POST['username'], $_POST['email'], $_POST['password']);

    if ($username) {
      $_SESSION['success_message'] = 'registered successfully  ';
      header("Location:  /login");
      exit();

    } else {
      $_SESSION['error_message'] = 'Not registered successfully  ';
      header("Location:  /register ");
      exit();

    }
  }
}
