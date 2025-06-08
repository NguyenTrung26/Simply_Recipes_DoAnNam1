<?php
session_start();
$txt_error = "";
?>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = mysqli_connect("localhost", "root", "123456", "nauan");
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1)
        {
              $_SESSION['username']=$username ;
            header("Location: menu.php");
        } else
        {
              $txt_error = "Tài khoản hoặc mật khẩu không chính xác";
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
  <title>Simply Recipes</title>
  <style>
body {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  margin: 0;
}

.login-form {
  width: 400px;
  padding: 30px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  margin: 50px auto;
}

.login-form h2 {
  text-align: center;
  margin-bottom: 20px;
}

.login-form label {
  display: block;
  margin-bottom: 5px;
}

.login-form input {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.login-form button {
  bottom: 10px;
  background-color: #007bff;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 100%; /* Make the button fill the width of its container */
}

.login-form__forgot {
  text-align: center;
  margin-top: 20px;
}
.registration-form__login {
      text-align: center;
      margin-top: 20px;
    }
</style>

  </style>
</head>

<body>
    <?php
     include("header.php");
    ?>

  <div class="login-form" style="margin: 0 auto">
    <h2>Đăng nhập</h2>
    <form action="" method="post">
      <label for="username">Tên đăng nhập:</label>
      <input type="text" id="username" name="username" placeholder="Tên tài khoản" >
      <label for="password">Mật khẩu:</label>
      <input type="password" id="password" name="password" placeholder="Mật khẩu" >
      <button type="submit">Đăng nhập</button>
      <?php
      if($txt_error != "") {
        echo "<font color='red'>".$txt_error."</font>";
      }
      ?>
      <p class="registration-form__login">Chưa có tài khoản? <a href="dangki.php">Đăng kí ngay</a></p>
    </form>
  </div>
</body>
</html>

  <style>


