<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

// Get the values from the GET request
$maHocSinh = $_GET['mahs'];

// Check if the hocsinh record exists based on ma_hoc_sinh
$selectQuery = "SELECT * FROM hocsinh WHERE ma_hoc_sinh = '$maHocSinh'";
$result = $conn->query($selectQuery);

if ($result->num_rows > 0) {
    // Record exists, fetch hoVaTen from the result
    $row = $result->fetch_assoc();
    $hoVaTen = $row['hovaten'];

    // Proceed with the insertion into the arrived table
    $time = date("H:i:s");
    $date = date("Y-m-d");

    $insertQuery = "INSERT INTO `arrived` (`id`, `ma_hoc_sinh`, `name`, `arrival_time`, `arrival_date`) VALUES (NULL, '$maHocSinh', '$hoVaTen', '$time', '$date')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Thêm học sinh thành công!";
    } else {
        echo "Lỗi khi thêm học sinh: " . $conn->error;
    }
} else {
    // Record does not exist, show an error message
    echo "Học sinh không tồn tại trong danh sách!";
}

$conn->close();
?>
