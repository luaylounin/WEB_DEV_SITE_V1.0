<?php
session_start();

// Check if the user is logged in and the order_id is set
if(!isset($_SESSION['user_id']) || !isset($_POST['order_id'])) {
    echo "Error: User not logged in or no order ID provided.";
    exit;
}

// Database connection
$connection = mysqli_connect('localhost','root','','laptop-store') or die('Connection error');

$Id = $_POST['order_id'];
$uId = $_SESSION['user_id'];

// Delete order query
$query = "DELETE FROM order_detail WHERE id=? AND uid=?";
$stmt = mysqli_prepare($connection, $query);

// Check if the statement was prepared correctly
if($stmt === false) {
    echo "Error preparing statement: " . htmlspecialchars(mysqli_error($connection));
    exit;
}

// Bind parameters and execute
mysqli_stmt_bind_param($stmt, 'ii', $Id, $uId);
$executed = mysqli_stmt_execute($stmt);

if($executed) {
    echo "Order Deleted Successfully";
} else {
    echo "Error deleting order: " . htmlspecialchars(mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
