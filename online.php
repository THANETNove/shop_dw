<?php
session_start(); // เริ่มต้น session


// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // ถ้ายังไม่ login ให้ไปหน้า login
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้าออนไลน์</title>
    <style>
        /* ตั้งค่าพื้นฐาน */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f8f8;
        }

        /* กำหนดให้รูปภาพแบนเนอร์เต็มจอ */
        .banner {
            width: 100%;
            display: block;
        }

        /* ปุ่ม Logout */
        .logout-container {
            text-align: right;
            padding: 10px;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .logout-btn {
            background-color: #ff3333;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #cc0000;
        }

        /* ส่วนแสดงสินค้าหลายอัน */
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            padding: 20px;
            margin-top: 24px;
            margin-bottom: 24px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            width: 250px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-img {
            width: 250px;
            height: 250px;
            border-radius: 8px;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .product-price {
            color: #ff5733;
            font-size: 16px;
            font-weight: bold;
            padding: 24px;
        }

        .product-price-shop {
            display: inline-block;
            background-color: #ff5733;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .product-price-shop :hover {
            background-color: #e64c2e;
        }




        /* Responsive design สำหรับมือถือ */
        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
                align-items: center;
            }

            .product-card {
                width: 90%;
            }
        }

        .add-to-cart {
            display: inline-block;
            background-color: #ff9800;
            /* สีส้ม */
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            text-decoration: none;
            margin-top: 10px;
        }

        .add-to-cart:hover {
            background-color: #e68900;
            /* สีส้มเข้มขึ้น */
            transform: scale(1.05);
            /* ขยายปุ่มเล็กน้อย */
        }

        .add-to-cart:active {
            transform: scale(0.95);
            /* กดแล้วปุ่มจะเล็กลงเล็กน้อย */
        }

        /* ปรับขนาดสำหรับมือถือ */
        @media (max-width: 768px) {
            .add-to-cart {
                width: 90%;
                /* ปรับให้เต็มจอมากขึ้น */
                font-size: 18px;
                padding: 12px 20px;
            }
        }
    </style>
</head>

<body>

    <!-- ปุ่ม Logout -->
    <div class="logout-container">

        <a href="logout.php" class="logout-btn">🚪 ออกจากระบบ</a>
    </div>

    <h1>เข้าสู้ระบบสำเร็จ</h1>
    <!-- ภาพแบนเนอร์ด้านบน -->


</body>

</html>