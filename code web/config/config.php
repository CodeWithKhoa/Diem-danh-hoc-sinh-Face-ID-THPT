<?php
// Thông tin kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "tqaponqr_dichvusieure";
$password = "tqaponqr_dichvusieure";
$database = "tqaponqr_dichvusieure";
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
header('Content-Type: text/html; charset=utf-8');
// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8");
$date = date("Y-m-d");
$time = date("H:i:s");
