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

    /* ปรับแบนเนอร์เป็นข้อความ */
    .banner-text {
        width: 100%;
        height: 150px;
        /* ปรับความสูง */
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ff9800;
        /* สีพื้นหลัง */
        color: white;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
    }

    /* ปรับแบนเนอร์สำหรับมือถือ */
    @media (max-width: 768px) {
        .banner-text {
            height: 180px;
            /* ลดความสูงลง */
            font-size: 24px;
            /* ลดขนาดตัวอักษร */
        }
    }

    /* Footer */
    .footer {
        width: 100%;
        background-color: #333;
        /* พื้นหลังสีเทาเข้ม */
        color: white;
        /* ตัวอักษรสีขาว */
        text-align: center;
        padding: 15px 0;
        font-size: 14px;
        margin-top: 30px;
        position: relative;
        bottom: 0;
    }

    /* ปรับขนาดสำหรับมือถือ */
    @media (max-width: 768px) {
        .footer {
            font-size: 12px;
            padding: 10px 0;
        }
    }
    </style>
</head>

<body>

    <!-- ปุ่ม Logout -->
    <div class="logout-container">
        <a href="cart_display.php" class="cart-btn">🛒 ตะกร้าสินค้า</a>
        <a href="order_history.php" class="order-history-btn">📜 ประวัติการสั่งซื้อ</a>
        <a href="logout.php" class="logout-btn">🚪 ออกจากระบบ</a>
    </div>

    <!-- ภาพแบนเนอร์ด้านบน -->
    <div class="banner-text">
        <h1>จำหน่ายเนื้อแช่แข็ง</h1>
    </div>
    <!-- ส่วนของสินค้า -->
    <div class="product-container">
        <div class="product-card">
            <img src="image/manu/a1.jpg" alt="สินค้า 1" class="product-img">
            <div class="product-name">สินค้า A</div>
            <div class="product-price">฿1,000</div>
            <button class="add-to-cart" data-name="สินค้า A" data-price="1000">เพิ่มลงตะกร้า</button>
        </div>
        <div class="product-card">
            <img src="image/manu/a6.jpg" alt="สินค้า 2" class="product-img">
            <div class="product-name">สินค้า B</div>
            <div class="product-price">฿1,200</div>
            <button class="add-to-cart" data-name="สินค้า B" data-price="1200">เพิ่มลงตะกร้า</button>
        </div>
        <div class="product-card">
            <img src="image/manu/a7.jpg" alt="สินค้า 3" class="product-img">
            <div class="product-name">สินค้า C</div>
            <div class="product-price">฿1,500</div>
            <button class="add-to-cart" data-name="สินค้า C" data-price="1500">เพิ่มลงตะกร้า</button>
        </div>
        <div class="product-card">
            <img src="image/manu/a8.jpg" alt="สินค้า 4" class="product-img">
            <div class="product-name">สินค้า D</div>
            <div class="product-price">฿1,800</div>
            <button class="add-to-cart" data-name="สินค้า D" data-price="1800">เพิ่มลงตะกร้า</button>
        </div>
        <div class="product-card">
            <img src="image/manu/a10.jpg" alt="สินค้า 1" class="product-img">
            <div class="product-name">สินค้า F</div>
            <div class="product-price">฿1,900</div>
            <button class="add-to-cart" data-name="สินค้า F" data-price="1900">เพิ่มลงตะกร้า</button>
        </div>
        <div class="product-card">
            <img src="image/manu/a11.jpg" alt="สินค้า 2" class="product-img">
            <div class="product-name">สินค้า L</div>
            <div class="product-price">฿1,200</div>
            <button class="add-to-cart" data-name="สินค้า L" data-price="1200">เพิ่มลงตะกร้า</button>
        </div>
        <div class="product-card">
            <img src="image/manu/a12.jpg" alt="สินค้า 3" class="product-img">
            <div class="product-name">สินค้า G</div>
            <div class="product-price">฿1,500</div>
            <button class="add-to-cart" data-name="สินค้า G" data-price="1500">เพิ่มลงตะกร้า</button>
        </div>
        <div class="product-card">
            <img src="image/manu/a13.jpg" alt="สินค้า 4" class="product-img">
            <div class="product-name">สินค้า K</div>
            <div class="product-price">฿1,800</div>
            <button class="add-to-cart" data-name="สินค้า K" data-price="1800">เพิ่มลงตะกร้า</button>
        </div>
        <div class="product-card">
            <img src="image/manu/a14.jpg" alt="สินค้า 4" class="product-img">
            <div class="product-name">สินค้า U</div>
            <div class="product-price">฿1,800</div>
            <button class="add-to-cart" data-name="สินค้า A" data-price="1800">เพิ่มลงตะกร้า</button>

        </div>
    </div>

    <script>
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productName = this.getAttribute('data-name');
            const price = this.getAttribute('data-price');

            fetch('cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `product_name=${productName}&price=${price}`
                })
                .then(response => response.json())
                .then(data => alert(data.message))
                .catch(error => console.error('Error:', error));
        });
    });
    </script>

    <!-- Footer -->
    <footer class="footer">
        <p>เว็บไซต์นี้จัดทำขึ้นโดย นายธัญพิสิษฐ์ เกิดพุ่ม | รหัสนักศึกษา: 653485017 | หมู่เรียน: 26.16</p>
    </footer>

</body>

</html>