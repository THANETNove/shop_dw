<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forever Your Flowers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: auto;
        }

        .header {
            background: url('flowers.jpg') no-repeat center;
            background-size: cover;
            text-align: center;
            color: white;
            padding: 40px 0;
            font-size: 28px;
            font-weight: bold;
        }

        .menu {
            width: 250px;
            float: left;
            background: url('menu-bg.jpg') repeat-y;
            padding: 0;
        }


        .menu img {
            display: block;
            width: 100%;
            height: auto;
            margin-bottom: 5px;
            cursor: pointer;
            margin-top: 16px;
        }

        .menu a:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .content {
            margin-left: 260px;
            background: #fdd;
            padding: 20px;
            min-height: 400px;
        }

        .footer {
            background: url('flowers.jpg') no-repeat center;
            background-size: cover;
            text-align: center;
            color: white;
            padding: 20px;
            font-size: 16px;
        }


        /* กำหนดให้รูปภาพแบนเนอร์เต็มจอ */
        .banner {
            width: 100%;
            display: block;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- ภาพแบนเนอร์ด้านบน -->
        <img src="image/Head-Banner.jpg" alt="Head Banner" class="banner">

        <div class="menu">
            <a href="login.php">
                <img src="image/Register.jpg" alt="เข้าสู่ระบบสมาชิก">
            </a>
            <a href="frozen_beef.php">
                <img src="image/Freeze-Meat.jpg" alt="เนื้อวัวเเช่เเข็ง">
            </a>
            <a href="beef_on_sale.php">
                <img src="image/Meat-Sale.jpg" alt="เนื้อวัวลดราคา">
            </a>
            <img src="image/online.jpg" alt="จัดจำหน่ายสินค้าออนไลน์">
            <img src="image/Payment.jpg" alt="จัดจำหน่ายส่งออนไลน์">
        </div>
        <div class="content">
            <p style="text-align: center; font-size: 18px;">โปรโมชั่นเดือนกุมภาพันธ์ - มีนาคม เนื้อวัวเเช่เเข็ง
                หรือทางออนไลน์<br>
                ครบ 599 ขึ้นไป</p>
        </div>
        <div class="footer">
            999 ม.1 ต.กัลปาสีคาม อ.เมืองสระแก้ว จ.สระแก้ว 27000<br>
            อีเมล: 999kxqarmjuwfl@gmail.com
        </div>
        <img src="image/Bottom.jpg" alt="Bottom Image" class="banner">
    </div>
</body>

</html>