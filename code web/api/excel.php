<?php
include $_SERVER['DOCUMENT_ROOT'].'/api/Classes/PHPExcel.php';
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES["file"])) {
        $file = $_FILES["file"]["tmp_name"];

        $objReader = PHPExcel_IOFactory::createReaderForFile($file);

        // Chỉ đọc tất cả các sheet
        $objReader->setLoadSheetsOnly();

        $objPHPExcel = $objReader->load($file);

        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

        // Xử lý dữ liệu và trả về kết quả dưới dạng JSON
        $response = array();

        $firstRowSkipped = false;

        foreach ($sheetData as $rowIndex => $row) {
            // Skip the first row (header)
            if (!$firstRowSkipped) {
                $firstRowSkipped = true;
                continue;
            }

            // Skip rows with empty values for all columns
            if (empty(array_filter($row))) {
                continue;
            }

            $ma_hoc_sinh = $row['B']; // Thay 'A' bằng cột chứa mã học sinh
            $hovaten = $row['C']; // Thay 'B' bằng cột chứa họ và tên

            // Check if the student already exists in the database
            $checkSql = "SELECT * FROM hocsinh WHERE ma_hoc_sinh = '$ma_hoc_sinh'";
            $checkResult = $conn->query($checkSql);

            if ($checkResult->num_rows > 0) {
                // Skip this row as the student already exists
                continue;
            }

            // Check if the date is in the expected format
            if (!empty($row['D'])) {
                $ngaysinh = DateTime::createFromFormat('d/m/Y', $row['D']);
                if ($ngaysinh !== false) {
                    $ngaysinh = $ngaysinh->format('Y-m-d');
                } else {
                    echo json_encode(array('error' => 'Invalid date format in row ' . ($rowIndex + 1) . ': ' . json_encode($row)));
                    exit;
                }
            } else {
                echo json_encode(array('error' => 'Missing date in row ' . ($rowIndex + 1) . ': ' . json_encode($row)));
                exit;
            }

            $lop = $row['F']; // Thay 'E' bằng cột chứa lớp

            // Chuẩn bị truy vấn SQL để thêm dữ liệu
            $sql = "INSERT INTO hocsinh (`id`, `ma_hoc_sinh`, `hovaten`, `ngaysinh`, `lop`) VALUES (null, '$ma_hoc_sinh', '$hovaten', '$ngaysinh', '$lop')";

            // Thực hiện truy vấn và kiểm tra thành công
            if ($conn->query($sql) === TRUE) {
                // Thêm thông tin vào mảng response
                $response[] = array(
                    'ma_hoc_sinh' => $ma_hoc_sinh,
                    'hovaten' => $hovaten,
                    'ngaysinh' => $ngaysinh,
                    'lop' => $lop
                );
            } else {
                echo json_encode(array('error' => 'Database error: ' . $conn->error));
                exit;
            }
        }

        // Trả về kết quả dưới dạng JSON
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array('error' => 'No file uploaded'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request method'));
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
