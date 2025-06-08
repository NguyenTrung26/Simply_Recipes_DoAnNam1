<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <title>Simply Recipes</title>
  <style>


body {
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}
.dashboard-wrapper {
    display: flex;
}

.sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar li {
    margin-bottom: 10px;
}

.sidebar a {
    text-decoration: none;
    color: #fff;
}

.main-content {
    flex-grow: 1;
    padding: 20px;
    background-color: #ecf0f1;
}
</style>

  </style>
</head>

<body>
    <?php
    //  include("headeradmin.php");
    ?>

<div class="dashboard-container">
  <aside class="sidebar">
    <div class="logo">
      <a href="#">
        <img src="assets/img/logo.png" alt="Simply Recipes">
      </a>
    </div>

   
  </aside>

  <div class="main-content">
    <h1>Welcome to Simply Recipes Admin Panel</h1>
    <p>This is the main content of your admin dashboard.</p>
  </div>
</div>

  </div>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 70px 0px 0px 0px;
            display: flex;
            height: 100vh;
        }

        #sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            height: 100%;
            height: 100%;
            flex-shrink: 0;
        }

        #main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            box-sizing: border-box; 
        }

        /* Your specific styles for the dashboard content */
        .dashboard-container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }

        .dashboard-box {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .dashboard-input {
            width: calc(100% - 18px);
            padding: 8px;
            box-sizing: border-box;
        }

        .dashboard-button {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
 .action-buttons {
            display: flex;
            gap: 5px;
        }

        .edit-button, .delete-button {
            padding: 5px 10px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
        }

        .delete-button {
            background-color: #dc3545;
        }
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .pagination a {
            text-decoration: none;
            color: #007bff;
            padding: 8px 16px;
            border: 1px solid #ddd;
            margin: 0 4px;
            border-radius: 4px;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .pagination .active {
            background-color: #007bff;
            color: white;
        }
        .recipe-image {
            max-width: 100px;
            max-height: 100px;
        }
        form {
        display: flex;
        margin-bottom: 20px;
    }

    input[type="text"] {
        flex: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 10px;
    }

    button {
        background-color: #007bff;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>

</head>
<body>
<?php
        include("headeradmin.php");
        // Kết nối CSDL
        $conn = mysqli_connect("localhost", "root", "123456", "nauan");

        // Kiểm tra kết nối
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Số món ăn trên mỗi trang
        $itemsPerPage = 10;

        // Lấy trang hiện tại từ tham số truyền vào hoặc mặc định là 1
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        // Tính vị trí bắt đầu của mỗi trang
        $startIndex = ($currentPage - 1) * $itemsPerPage;

        
    ?>

    <div id="sidebar">
        <h2>Xin chào, Admin </h2>
        <br>
        <h2 style="text-align: center;">Menu</h2>
        <br>
            <ul><a href="admin.php">Công thức</a></ul>
                <li><a href="">Thức ăn</a></li>
                <li><a href="">Nước uống</a></li>
                <li><a href="">Mẹo</a></li>
            <ul><a href="#">Người dùng</a></ul>

    </div>
    <div id="main-content">
            <form action="" method="POST">
                <input type="text" name="noidung" placeholder="Nhập từ khóa tìm kiếm">
                <button type="submit" name="btn">Tìm kiếm</button>
            </form>

            <?php
            if(isset($_POST['btn'])){
                    $noidung = $_POST['noidung'];
            } else{
                $noidung = false;
            }
            ?>

            <?php
                $conn = mysqli_connect("localhost", "root", "123456", "nauan");
                $sql = "SELECT*FROM congthuc WHERE tenmonan LIKE '%$noidung%' LIMIT $startIndex, $itemsPerPage";
                $result = mysqli_query($conn, $sql);
            ?>
    <h2>Danh sách công thức nấu ăn</h2>

            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên món ăn</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['idmonan'] . '</td>';
                            echo '<td>' . $row['tenmonan'] . '</td>';
                            echo '<td><img class="recipe-image" src="anh/' . $row['anh'] . '" alt="' . $row['tenmonan'] . '"></td>';
                            echo '<td class="action-buttons">';
                            echo '<a class="edit-button" href="suamonan.php?id=' . $row['idmonan'] . '">Sửa</a>';
                            echo '<a class="delete-button" href="delete.php?id=' . $row['idmonan'] . '">Xóa</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>

            <!-- Hiển thị phân trang -->
            <div class="pagination">
                <?php
                    // Tính số trang
                    $totalItems = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM congthuc WHERE tenmonan LIKE '%$noidung%'"));
                    $totalPages = ceil($totalItems / $itemsPerPage);

                    // Hiển thị các liên kết trang
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<a href="?page=' . $i . '" ' . (($i == $currentPage) ? 'class="active"' : '') . '>' . $i . '</a>';
                    }
                ?>
            </div>
        </div>
    </div>

    <?php
        // Đóng kết nối CSDL
        mysqli_close($conn);
    ?>
</body>
</html>
