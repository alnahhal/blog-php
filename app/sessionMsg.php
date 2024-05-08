<?php

// Check if there's an error message in the session
if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
    // Clear the error message from the session
    unset($_SESSION['error_message']);
}

// Check if there's a success message in the session
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
    // Clear the success message from the session
    unset($_SESSION['success_message']);
}
