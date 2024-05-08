<?php

include  __DIR__ . '/../models/User.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $user_id = $_SESSION['user']->id;

    $u = new User();

    if ($u->checkPassword($user_id, $oldpassword)) {

        $encrypted_password = password_hash($newpassword, PASSWORD_DEFAULT);
        $u->editProfile($user_id, $username, $email, $encrypted_password);

        $_SESSION['user'] = $u->getUserByUsername($username);

        $_SESSION['success_message'] = 'profile updated successfully';
        header("Location:  /profile ");
        exit();
    }

    $_SESSION['error_message'] = 'incorrect Old Password';
    header("Location:  /edit-profile-view ");
    exit();
}
