<?php
session_start(); 

$txt_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipe_name = $_POST['recipe_name'];
    $location = $_POST['location'];
    $prep_time = $_POST['prep_time'];
    $cook_time = $_POST['cook_time'];
    $level = $_POST['level'];
    $ingredients = $_POST['ingredients'];

    // Get the image
    $image = $_FILES['image']['name'];
    $target_dir = "anh/";
    $target_file = $target_dir . basename($image);

    // Upload the image
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {

        $conn = mysqli_connect("localhost", "root", "123456", "nauan");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO congthuc (tenmonan, diadanh, chuanbi, chebien, mucdo, nguyenlieu,iddanhmuc, anh) VALUES ('$recipe_name', '$location', '$prep_time', '$cook_time', '$level', '$ingredients','1', '$image')";

        if (mysqli_query($conn, $sql)) {
            $txt_error= "Công thức đã được thêm thành công!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Có lỗi khi upload ảnh!";
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
    <title>Simply Recipes - Thêm công thức món ăn</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 120vh;
            margin: 0;
        }

        .recipe-form {
            width: 800px;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin: 50px auto;
        }

        .recipe-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .recipe-form label {
            display: block;
            margin-bottom: 5px;
        }

        .recipe-form input,
        .recipe-form textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            resize: vertical; /* Allow vertical resizing for textarea */
        }

        .recipe-form button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%; /* Make the button fill the width of its container */
        }

        .recipe-form__back {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="recipe-form" style="margin: 0 auto">
        <h2>Thêm công thức món ăn</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="recipe_name">Tên món ăn:</label>
            <input type="text" id="recipe_name" name="recipe_name" placeholder="Nhập tên món ăn">

            <label for="location">Địa danh:</label>
            <input type="text" id="location" name="location" placeholder="Nhập địa danh">

            <label for="prep_time">Thời gian chuẩn bị:</label>
            <input type="text" id="prep_time" name="prep_time" placeholder="Nhập thời gian chuẩn bị">

            <label for="cook_time">Thời gian chế biến:</label>
            <input type="text" id="cook_time" name="cook_time" placeholder="Nhập thời gian chế biến">

            <label for="level">Mức độ:</label>
            <select name="level" id="level">
                <option value="Dễ">Dễ</option>
                <option value="Vừa">Vừa</option>
                <option value="Khó">Khó</option>
            </select>

            <label for="ingredients">Nguyên liệu:</label>
            <textarea id="ingredients" name="ingredients" placeholder="Nhập nguyên liệu"></textarea>

            <label for="image">Ảnh:</label>
            <input type="file" id="image" name="image">

            <label for="iddanhmuc">Danh mục:</label>
            <select name="iddanhmuc" id="iddanhmuc">
                <?php
                $conn = mysqli_connect("localhost", "root", "123456", "nauan");

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM danhmuc";
                $kq = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($kq)) {
                    echo '<option value="' . $row["id"] . '">' . $row['tendanhmuc'] . '</option>';
                }

                mysqli_close($conn);
                ?>
            </select><br>

            <button type="submit">Thêm công thức</button>
            <?php
            if ($txt_error!="") {
                echo '<p style="color:red;text-align: center;">' . $txt_error . '</p>';
            }
            ?>
            <p class="recipe-form__back"><a href="index.php">Quay lại trang chủ</a></p>
        </form>
    </div>
</body>

</html>