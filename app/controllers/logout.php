<?php

session_start();
session_destroy();
// Delete the cookie by setting its expiration time to the past
setcookie('rememberMe', '', time() - 3600, '/');

// Redirect to the logout success page or any other desired location
header("Location: /login");
exit();
