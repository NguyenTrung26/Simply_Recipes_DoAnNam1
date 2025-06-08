<!-- suacongthuc.php -->
<?php
$txt_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipe_name = $_POST['recipe_name'];
    $location = $_POST['location'];
    $prep_time = $_POST['prep_time'];
    $cook_time = $_POST['cook_time'];
    $level = $_POST['level'];
    $ingredients = $_POST['ingredients'];
    $id=$_GET['id'];


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

        $sql = "UPDATE congthuc SET tenmonan='$recipe_name', diadanh='$location', chuanbi='$prep_time', chebien='$cook_time', mucdo='$level', nguyenlieu='$ingredients', anh='$image' WHERE idmonan=$id";

        if (mysqli_query($conn, $sql)) {
            $txt_error = "Thông tin công thức đã được cập nhật thành công!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        $txt_error= "Có lỗi khi upload ảnh!";
    }
} else {
    // Lấy thông tin món ăn cần sửa từ CSDL
    $recipe_id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "123456", "nauan");
    $sql = "SELECT * FROM congthuc WHERE idmonan=$recipe_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $recipe_name = $row['tenmonan'];
        $location = $row['diadanh'];
        $prep_time = $row['chuanbi'];
        $cook_time = $row['chebien'];
        $level = $row['mucdo'];
        $ingredients = $row['nguyenlieu'];
        $image=$row['anh'];
    } else {
        echo "Không tìm thấy công thức món ăn!";
    }

    mysqli_close($conn);
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
    <title>Simply Recipes - Sửa thông tin món ăn</title>
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

        .recipe-form__message {
            text-align: center;
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="recipe-form" style="margin: 0 auto">
        <h2>Sửa thông tin món ăn</h2>
        <?php
        if ($txt_error != "") {
            echo '<p class="recipe-form__message">' . $txt_error . '</p>';
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
            <label for="recipe_name">Tên món ăn:</label>
            <input type="text" id="recipe_name" name="recipe_name" value="<?php echo $recipe_name; ?>" placeholder="Nhập tên món ăn">

            <label for="location">Địa danh:</label>
            <input type="text" id="location" name="location" value="<?php echo $location; ?>" placeholder="Nhập địa danh">

            <label for="prep_time">Thời gian chuẩn bị:</label>
            <input type="text" id="prep_time" name="prep_time" value="<?php echo $prep_time; ?>" placeholder="Nhập thời gian chuẩn bị">

            <label for="cook_time">Thời gian chế biến:</label>
            <input type="text" id="cook_time" name="cook_time" value="<?php echo $cook_time; ?>" placeholder="Nhập thời gian chế biến">

            <label for="level">Mức độ:</label>
            <select name="level" id="level">
                <option value="Dễ" <?php if ($level == 'Dễ') echo 'selected'; ?>>Dễ</option>
                <option value="Vừa" <?php if ($level == 'Vừa') echo 'selected'; ?>>Vừa</option>
                <option value="Khó" <?php if ($level == 'Khó') echo 'selected'; ?>>Khó</option>
            </select>

            <label for="ingredients">Nguyên liệu:</label>
            <textarea id="ingredients" name="ingredients" placeholder="Nhập nguyên liệu"><?php echo $ingredients; ?></textarea>

            <label for="image">Ảnh:</label>
            <input type="file" id="image" name="image" >

            <button type="submit">Cập nhật thông tin</button>
            <p class="recipe-form__back"><a href="index.php">Quay lại trang chủ</a></p>
        </form>
    </div>
</body>

</html>
