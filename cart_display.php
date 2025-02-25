<?php
session_start();
include('config.php'); // เชื่อมต่อฐานข้อมูล

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM cart WHERE user_id='$user_id'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        text-align: center;
        margin: 0;
        padding: 20px;
    }

    .cart-container {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #ff9800;
        color: white;
    }

    .total-row {
        font-size: 18px;
        font-weight: bold;
        background-color: #ffcc80;
    }

    .btn-container {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn {
        background-color: #ff9800;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        font-size: 16px;
        transition: 0.3s;
    }

    .btn:hover {
        background-color: #e68900;
    }

    .btn-danger {
        background-color: #ff3333;
    }

    .btn-danger:hover {
        background-color: #cc0000;
    }

    .empty-cart {
        font-size: 18px;
        color: #666;
        margin-top: 20px;
    }
    </style>
</head>

<body>

    <div class="cart-container">
        <h2>🛒 ตะกร้าสินค้า</h2>

        <?php if (mysqli_num_rows($result) == 0): ?>
        <p class="empty-cart">ไม่มีสินค้าในตะกร้า</p>
        <div class="btn-container">
            <a href="index.php" class="btn">กลับไปซื้อสินค้า</a>
        </div>
        <?php else: ?>
        <table>
            <tr>
                <th>สินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>รวม</th>
                <th>ลบ</th>
            </tr>

            <?php
                $total = 0;
                while ($row = mysqli_fetch_assoc($result)):
                    $sum = $row['price'] * $row['quantity'];
                    $total += $sum;
                ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo number_format($row['price'], 2); ?> ฿</td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo number_format($sum, 2); ?> ฿</td>
                <td>
                    <a href="remove_from_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">❌</a>
                </td>
            </tr>
            <?php endwhile; ?>

            <tr class="total-row">
                <td colspan="3">รวมทั้งหมด</td>
                <td><?php echo number_format($total, 2); ?> ฿</td>
                <td></td>
            </tr>
        </table>

        <div class="btn-container">
            <a href="home.php" class="btn">🏠 กลับหน้าแรก</a>
            <a href="checkout.php" class="btn">✅ ชำระเงิน</a>
        </div>
        <?php endif; ?>
    </div>

</body>

</html>