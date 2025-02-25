<?php
session_start();
include('config.php'); // เชื่อมต่อฐานข้อมูล

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['username'];
$query = "SELECT * FROM cart WHERE user_id='$user_id'";
$result = mysqli_query($conn, $query);

echo "<h2>ตะกร้าสินค้า</h2>";
echo "<table border='1'><tr><th>สินค้า</th><th>ราคา</th><th>จำนวน</th><th>รวม</th></tr>";

$total = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $sum = $row['price'] * $row['quantity'];
    echo "<tr>
            <td>{$row['product_name']}</td>
            <td>{$row['price']} ฿</td>
            <td>{$row['quantity']}</td>
            <td>{$sum} ฿</td>
          </tr>";
    $total += $sum;
}

echo "<tr><td colspan='3'>รวมทั้งหมด</td><td>{$total} ฿</td></tr>";
echo "</table>";
echo "<a href='checkout.php'>ชำระเงิน</a>";