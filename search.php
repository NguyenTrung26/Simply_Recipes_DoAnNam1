<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "monan";

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy từ khóa tìm kiếm từ yêu cầu GET
$keyword = $_GET["food"];

// Chuẩn bị truy vấn SELECT
$sql = "SELECT * FROM monan WHERE title LIKE '%$food%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Tạo một mảng chứa kết quả tìm kiếm
    $searchResults = array();

    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }

    // Trả về kết quả dưới dạng JSON
    header("Content-Type: application/json");
    echo json_encode($searchResults);
} else {
    // Không tìm thấy kết quả
    echo "Không tìm thấy kết quả";
}

// Đóng kết nối
$conn->close();
?>
