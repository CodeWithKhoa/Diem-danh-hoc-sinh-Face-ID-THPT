<?php

include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

$action = $_POST["action"];

if ($action == "search") {
    $searchQuery = $_POST['search_query'];

    // Perform a search query based on hovaten (Họ và Tên)
    $searchResults = array();

    $selectQuery = "SELECT * FROM hocsinh WHERE hovaten LIKE '%$searchQuery%'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
        echo json_encode($searchResults);
    } else {
        // No results found
        echo json_encode(array());
    }
} else if ($action == "add") {
    $maHocSinh = $_POST["ma_hoc_sinh"];
    $hoVaTen = $_POST["hovaten"];
    $ngaySinh = $_POST["ngaysinh"];
    $lop = $_POST["lop"];

    $sql = "INSERT INTO hocsinh (ma_hoc_sinh, hovaten, ngaysinh, lop) VALUES ('$maHocSinh', '$hoVaTen', '$ngaySinh', '$lop')";

    if ($conn->query($sql) === TRUE) {
        echo "Thông tin học sinh đã được thêm thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} elseif ($action == "edit") {
    $mahocsinhold = $_POST["ma_old"];
    $maHocSinh = $_POST["ma_hoc_sinh"];
    $hoVaTen = $_POST["hovaten"];
    $ngaySinh = $_POST["ngaysinh"];
    $lop = $_POST["lop"];
    // Check if the hocsinh record exists based on ma_hoc_sinh
    $selectQuery = "SELECT * FROM hocsinh WHERE ma_hoc_sinh = '$mahocsinhold'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {

        $sql = "UPDATE hocsinh SET ma_hoc_sinh='$maHocSinh', hovaten='$hoVaTen', ngaysinh='$ngaySinh', lop='$lop' WHERE ma_hoc_sinh=$mahocsinhold";
    
        if ($conn->query($sql) === TRUE) {
            echo "Thông tin học sinh đã được sửa thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Lỗi: Học sinh không tồn tại trong danh sách!";
    }
} else if ($action == "delete") {
    $maHocSinh = $_POST['mahs'];
    // Check if the hocsinh record exists based on ma_hoc_sinh
    $selectQuery = "SELECT * FROM hocsinh WHERE ma_hoc_sinh = '$maHocSinh'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        // Record exists, proceed with the deletion
        $deleteQuery = "DELETE FROM hocsinh WHERE ma_hoc_sinh = '$maHocSinh'";
        
        if ($conn->query($deleteQuery) === TRUE) {
            echo "Xóa học sinh thành công!";
        } else {
            echo "Lỗi khi xóa học sinh: " . $conn->error;
        }
    } else {
        // Record does not exist, show a message
        echo "Lỗi: Học sinh không tồn tại trong danh sách!";
    }
}

$conn->close();
?>