<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $delete_query = "DELETE FROM cart WHERE id='$item_id' AND user_id='$user_id'";
    mysqli_query($conn, $delete_query);
}

header("Location: cart_display.php");
exit();
