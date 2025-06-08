<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lí đăng kí</title>
</head>
<body>
    <h1>Xử lí đăng kí</h1>
    <?php
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];


            if (empty($username) || empty($password) || empty($confirm_password) ) {
                echo 'Vui lòng điền đầy đủ và chính xác thông tin.' . '<a href="dangki.php">Thử lại.</a>';
            } elseif ($password !== $confirm_password) {
                header("Location:loisaimk.php");
            } else {
                $conn = mysqli_connect("localhost", "root", "123456", "nauan");
                $check = "SELECT * FROM user WHERE username='$username'";
                $result = mysqli_query($conn, $check);
                if (mysqli_num_rows($result) > 0) {
                    header("Location:tentoitai.php");
                } else {
                    $insert_user_query = "INSERT INTO user (username,password) VALUES ('$username', '$password')";
                    mysqli_query($conn, $insert_user_query);
                    header("Location:dangnhap       .php");
                }

                // Close the database connection
                mysqli_close($conn);
            }

    ?>
</body>
</html>
