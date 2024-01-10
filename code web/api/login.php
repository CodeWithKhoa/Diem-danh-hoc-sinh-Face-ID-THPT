<?php
// Include the database configuration
include('../config/config.php');
session_start();
// Kiểm tra nếu là yêu cầu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ yêu cầu
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sử dụng câu lệnh chuẩn bị để ngăn chặn tấn công SQL injection
    $stmt = $conn->prepare("SELECT * FROM account WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra xem có bản ghi nào khớp với email không
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Kiểm tra mật khẩu
        if ($password == $row['password']) {
            // Đăng nhập thành công
            $response = array('success' => true);
            $_SESSION["username"]=$email;
            // Thực hiện các thao tác khác nếu cần
        } else {
            // Đăng nhập không thành công
            $response = array('success' => false, 'error' => 'Sai Password');
        }
    } else {
        // Đăng nhập không thành công
        $response = array('success' => false, 'error' => 'Email not found');
    }

    // Trả về kết quả dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($response);

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    // Trả về lỗi nếu không phải là yêu cầu POST
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
