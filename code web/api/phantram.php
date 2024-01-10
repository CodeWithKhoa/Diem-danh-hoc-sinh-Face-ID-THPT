<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
// Truy vấn SQL để đếm số lượng học sinh
$sql = "SELECT COUNT(*) AS total_students FROM hocsinh";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lấy dữ liệu từ kết quả
    $row = $result->fetch_assoc();
    $totalStudents = $row['total_students'];
    
} else {
    echo "Không có dữ liệu.";
}

// Tránh SQL injection
$searchTerm = mysqli_real_escape_string($conn, $date);

// Truy vấn SQL để đếm số lượng học sinh theo ngày đến
$sql = "SELECT COUNT(*) as student_count FROM arrived WHERE arrival_date LIKE '$searchTerm%'";
$result = $conn->query($sql);

if ($result) {
    // Lấy số lượng học sinh từ kết quả truy vấn
    $row = $result->fetch_assoc();
    $studentCount = $row['student_count'];
} else {
    // Xử lý lỗi nếu có
    $studentCount = 0;
}

// Đóng kết nối
$conn->close();

$lamtron = 2;
$soluong=$totalStudents;
$daden=$studentCount;
$chuaden=$soluong-$daden;

$phantramden = ($daden/$soluong)*100;
$phantramchua = 100 -$phantramden;
// Simulate fetching percentage data (replace this with your actual data retrieval logic)
$percentageData = array(round($phantramden,$lamtron),round($phantramchua,$lamtron));

// Set the content type to JSON
header('Content-Type: application/json');

// Convert the PHP array to JSON and echo it
echo json_encode($percentageData);