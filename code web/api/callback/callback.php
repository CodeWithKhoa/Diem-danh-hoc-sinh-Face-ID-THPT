<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
header('Content-Type: application/json; charset=utf-8');
// Xử lý dữ liệu đầu vào từ người dùng (ví dụ: từ trang web)
$searchTerm = $_GET['search']; // Giả sử dữ liệu được gửi từ một biểu mẫu GET hoặc POST

// Tránh SQL injection
$searchTerm = mysqli_real_escape_string($conn, $searchTerm);

// Truy vấn SQL để tìm kiếm học sinh theo tên
$sql = "SELECT * FROM arrived WHERE arrival_date LIKE '$searchTerm%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $students = $result->fetch_all(MYSQLI_ASSOC);

    // Trả về kết quả dưới dạng JSON
    echo json_encode($students);
} else {
    echo json_encode(array());
}

// Đóng kết nối
$conn->close();
