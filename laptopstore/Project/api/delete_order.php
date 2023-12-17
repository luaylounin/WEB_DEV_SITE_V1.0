<?php
session_start();

// Set the content type to HTML
header('Content-Type: text/html; charset=utf-8');

// Enable error reporting for debugging (remove/comment this in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in and the order_id is set
if (!isset($_SESSION['user_id']) || !isset($_POST['order_id'])) {
    echo "<script>alert('Error: User not logged in or no order ID provided.'); window.location.href='../';</script>";
    exit;
}

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'laptop-store') or die('Connection error');

// Sanitize and validate the input
$Id = filter_var($_POST['order_id'], FILTER_VALIDATE_INT);
$uId = $_SESSION['user_id'];

if ($Id === false) {
    echo '<script>alert("Invalid order ID."); window.location.href="../";</script>';
    exit;
}

// Log the IDs for debugging
error_log("Attempting to delete order. Order ID: $Id, User ID: $uId");

// Delete order query
$query = "DELETE FROM order_detail WHERE id=? AND uid=?";
$stmt = mysqli_prepare($connection, $query);

// Check if the statement was prepared correctly
if ($stmt === false) {
    echo '<script>alert("Error preparing statement: ' . addslashes(htmlspecialchars(mysqli_error($connection))) . '"); window.location.href="../";</script>';
    exit;
}

// Bind parameters and execute
mysqli_stmt_bind_param($stmt, 'ii', $Id, $uId);
$executed = mysqli_stmt_execute($stmt);

if ($executed) {
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo 'Order Deleted Successfully';
    } else {
        echo '<No order found or you do not have permission to delete this order';
    }
} else {
    echo '<script>alert("Error deleting order: ' . addslashes(htmlspecialchars(mysqli_stmt_error($stmt))) . '"); window.location.href="../myorders.php";</script>';
}

mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
