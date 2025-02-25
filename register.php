<?php
include('config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // ตรวจสอบว่าชื่อผู้ใช้ซ้ำหรือไม่
    $check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "ชื่อผู้ใช้นี้มีอยู่แล้ว";
    } else {
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: home.php');
            exit();
        } else {
            echo "เกิดข้อผิดพลาด: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - ร้านค้า</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="login-container">
        <h2>สมัครสมาชิก</h2>
        <?php if (isset($error)) echo "<p class='error-msg'>$error</p>"; ?>
        <form action="register.php" method="POST">
            <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" name="username" required>

            <label for="password">รหัสผ่าน:</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn-register">สมัครสมาชิก</button>
        </form>
        <p>มีบัญชีอยู่แล้ว? <a href="index.php">เข้าสู่ระบบ</a></p>
    </div>
</body>

</html>