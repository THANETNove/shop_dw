<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY purchase_date DESC";
$result = mysqli_query($conn, $query);

echo "<h2>ประวัติการสั่งซื้อ</h2>";
echo "<table border='1'><tr><th>สินค้า</th><th>ราคา</th><th>จำนวน</th><th>วันที่ซื้อ</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['product_name']}</td>
            <td>{$row['price']} ฿</td>
            <td>{$row['quantity']}</td>
            <td>{$row['purchase_date']}</td>
          </tr>";
}

echo "</table>";