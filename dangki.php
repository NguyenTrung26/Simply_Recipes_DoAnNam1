<?php
session_start();
$txt_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $txt_error = "Vui lòng điền đầy đủ và chính xác thông tin.";
    } elseif ($password !== $confirm_password) {
        $txt_error = "Mật khẩu không trùng khớp";
    } else {
        $conn = mysqli_connect("localhost", "root", "123456", "nauan");

        if (!$conn) {
            die("Kết nối không thành công: " . mysqli_connect_error());
        }

        $check = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($conn, $check);

        if (!$result) {
            die("Truy vấn không thành công: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $txt_error = "Tên tài khoản đã tồn tại";
        } else {
            $insert_user_query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
            $result_insert = mysqli_query($conn, $insert_user_query);

            if (!$result_insert) {
                die("Lỗi khi thực hiện truy vấn: " . mysqli_error($conn));
            } else {
                header("Location: dangnhap.php");
                exit();
            }
        }

        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles1.css">
    <title>Simply Recipes - Đăng kí</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .registration-form {
            width: 400px;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin: 50px auto;
        }

        .registration-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .registration-form label {
            display: block;
            margin-bottom: 5px;
        }

        .registration-form input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .registration-form button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .registration-form__login {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="registration-form" style="margin: 0 auto">
        <h2>Đăng kí</h2>
        <form action="" method="post">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" placeholder="Tên tài khoản">

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Mật khẩu">

            <label for="confirm_password">Xác nhận mật khẩu:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu">

            <button type="submit">Đăng kí</button>
            <?php
            if ($txt_error!="") {
                echo '<p style="color:red;">' . $txt_error . '</p>';
            }
            ?>
            <p class="registration-form__login">Đã có tài khoản? <a href="dangnhap.php">Đăng nhập ngay</a></p>
        </form>
    </div>
</body>

</html>
