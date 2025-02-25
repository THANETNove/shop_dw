<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านขายดอกไม้</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f8f8f8;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .product {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        width: 250px;
        margin: 10px;
        padding: 10px;
        text-align: center;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .product img {
        width: 100%;
        border-radius: 8px;
    }

    .product h3 {
        font-size: 18px;
        margin: 10px 0;
    }

    .product p {
        font-size: 16px;
        color: #555;
    }

    .product button {
        background-color: #ff6f61;
        color: white;
        border: none;
        padding: 10px;
        width: 100%;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
    }

    .product button:hover {
        background-color: #e65c50;
    }

    .product-img {
        width: 250px;
        height: 250px;
        border-radius: 8px;
    }

    .back-button {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #555;
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
    }

    .back-button:hover {
        background-color: #333;
    }
    </style>
</head>

<body>

    <div class="container">
        <a href="index.php" class="back-button">กลับ</a>

        <div class="product">
            <img src="image/manu/a8.jpg" alt="My Heart" class="product-img">
            <h3>เนื้อสันในนิวซีแลนด์ ตัดสเต๊ก (พรีเมียม)</h3>
            <p>ราคา: 360 บาท <span>ลดเหลือ 240 บาท</span></p>
            <button>สั่งซื้อ</button>
        </div>
        <div class="product">
            <img src="image/manu/a12.jpg" alt="Sunshine Love" class="product-img">
            <h3>เนื้อสันในออสเตรเลียพรีเมียม ตัดสเต๊ก</h3>
            <p>ราคา: 400 บาท <span>ลดเหลือ 260 บาท</span></p>
            <button>สั่งซื้อ</button>
        </div>
        <div class="product">
            <img src="image/manu/a9.jpg" alt="Graceful Love" class="product-img">
            <h3>เนื้อไหล่ส่วนบนแองกัสออสเตรเลีย สไลซ์</h3>
            <p>ราคา: 140 บาท <span>ลดเหลือ 91 บาท</span></p>
            <button>สั่งซื้อ</button>
        </div>
    </div>
</body>

</html>