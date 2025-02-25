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
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการสั่งซื้อ</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
        text-align: center;
        margin: 0;
        padding: 20px;
    }

    .order-container {
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

    .empty-history {
        font-size: 18px;
        color: #666;
        margin-top: 20px;
    }
    </style>
</head>

<body>

    <div class="order-container">
        <h2>📜 ประวัติการสั่งซื้อ</h2>

        <?php if (mysqli_num_rows($result) == 0): ?>
        <p class="empty-history">ยังไม่มีประวัติการสั่งซื้อ</p>
        <div class="btn-container">
            <a href="index.php" class="btn">🏠 กลับหน้าแรก</a>
        </div>
        <?php else: ?>
        <table>
            <tr>
                <th>สินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>วันที่ซื้อ</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo number_format($row['price'], 2); ?> ฿</td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['purchase_date']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <div class="btn-container">
            <a href="home.php" class="btn">🏠 กลับหน้าแรก</a>
        </div>
        <?php endif; ?>
    </div>

</body>

</html>