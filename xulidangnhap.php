<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xu ly dang nhap</title>
</head>
<body>
    <h1>Xu li dang nhap</h1>
    <?php
        $username = $_GET['username'];
        $password = $_GET['password'];
        $conn = mysqli_connect("localhost", "root", "123456", "nauan");
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1)
        {
              $_SESSION['username']=$username ;
            header("Location: menu.php");
        } else
        {
            echo 'Thong tin khong chinh xac.' . '<a href="dangnhap.php">Thu lai.' .'</a>';
        }
        

    ?>
</body>
</html>
 
