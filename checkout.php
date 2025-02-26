<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM cart WHERE user_id='$user_id'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $product_name = $row['product_name'];
    $price = $row['price'];
    $quantity = $row['quantity'];

    $insert = "INSERT INTO orders (user_id, product_name, price, quantity) 
               VALUES ('$user_id', '$product_name', '$price', '$quantity')";
    mysqli_query($conn, $insert);
}

// ล้างตะกร้า
mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");

header("Location: order_history.php");
exit();
