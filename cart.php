<?php
session_start();
include('config.php'); // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["status" => "error", "message" => "กรุณาเข้าสู่ระบบ"]);
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];

    // เช็คว่าสินค้าซ้ำไหม
    $check = "SELECT * FROM cart WHERE user_id='$user_id' AND product_name='$product_name'";
    $result = mysqli_query($conn, $check);
    if (mysqli_num_rows($result) > 0) {
        $update = "UPDATE cart SET quantity = quantity + 1 WHERE user_id='$user_id' AND product_name='$product_name'";
        mysqli_query($conn, $update);
    } else {
        $insert = "INSERT INTO cart (user_id, product_name, price, quantity) VALUES ('$user_id', '$product_name', '$price', 1)";
        mysqli_query($conn, $insert);
    }

    echo json_encode(["status" => "success", "message" => "เพิ่มสินค้าลงตะกร้าแล้ว"]);
    exit();
}