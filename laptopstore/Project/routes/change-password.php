<?php

require_once 'C:/Users/luayl/vendor/autoload.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection setup
    $connection = mysqli_connect('localhost', 'root', '', 'laptop-store') or die('Connection error');

    $Id = $_SESSION['id']; // The user's ID should be securely retrieved from your session or another source.
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    // Fetch the user's current password hash from the database
    $stmt = mysqli_prepare($connection, "SELECT password FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Verify current password
    if (password_verify($oldPassword, $user['password'])) {
        // Check if new password and confirmation match
        if ($newPassword === $confirmNewPassword) {
            // Enforce strong password policies
            if (strlen($newPassword) >= 8 && preg_match('/[A-Z]/', $newPassword) && preg_match('/[0-9]/', $newPassword)) {
                // Update the user's password
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateStmt = mysqli_prepare($connection, "UPDATE users SET password = ? WHERE id = ?");
                mysqli_stmt_bind_param($updateStmt, "si", $newPasswordHash, $userId);
                if (mysqli_stmt_execute($updateStmt)) {
                    echo "Password changed successfully.";
                } else {
                    echo "Error: Could not change the password.";
                }
            } else {
                echo "Password must be at least 8 characters long and include at least one uppercase letter and one number.";
            }
        } else {
            echo "New passwords do not match.";
        }
    } else {
        echo "Current password is incorrect.";
    }
    
    mysqli_stmt_close($stmt);
    mysqli_stmt_close($updateStmt);
    mysqli_close($connection);
} else {
    // Redirect back to the change password page if not a POST request
    header('Location: change-password.php');
    exit();
}
