<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/api/Classes/PHPExcel.php';
include $_SERVER['DOCUMENT_ROOT'].'/api/Classes/PHPExcel/IOFactory.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DownloadUnarrived'])) {
    $objExcel = new PHPExcel();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('12A9');

    $rowCount = 1;

    $sheet->setCellValue('A' . $rowCount, "Stt");
    $sheet->setCellValue('B' . $rowCount, 'Mã Học Sinh');
    $sheet->setCellValue('C' . $rowCount, "Họ Và Tên");
    $sheet->setCellValue('D' . $rowCount, 'Ngày Sinh');
    $sheet->setCellValue('E' . $rowCount, 'Lớp');

    $sheet->getColumnDimension("A")->setAutoSize(true);
    $sheet->getColumnDimension("B")->setAutoSize(true);
    $sheet->getColumnDimension("C")->setAutoSize(true);
    $sheet->getColumnDimension("D")->setAutoSize(true);
    $sheet->getColumnDimension("E")->setAutoSize(true);

    $sheet->getStyle("A1:E1")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setARGB('eeffffee');

    $sheet->getStyle("A1:E1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    // Get the current date in the format 'Y-m-d'
    $currentDate = date('Y-m-d');

    $sql = "SELECT h.ma_hoc_sinh, h.hovaten, h.ngaysinh, h.lop
            FROM hocsinh h
            WHERE NOT EXISTS (
                SELECT 1 FROM arrived a 
                WHERE a.ma_hoc_sinh = h.ma_hoc_sinh AND a.arrival_date = ?
            )";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $currentDate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rowCount++;
            $sheet->setCellValue("A" . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $row['ma_hoc_sinh']);
            $sheet->setCellValue('C' . $rowCount, $row['hovaten']);
            $sheet->setCellValue('D' . $rowCount, $row['ngaysinh']);
            $sheet->setCellValue('E' . $rowCount, $row['lop']);
        }
    }

    $styleArray = array(
        'borders' => array(
            'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
        ),
    );

    $sheet->getStyle("A1:E" . $rowCount)->applyFromArray($styleArray);

    $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
    $filename = 'export_unarrived_'.date("d/m/Y").'.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');
    $objWriter->save('php://output');
    exit;

} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DownloadArrived'])) {
    $objExcel = new PHPExcel();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('12A9');

    $rowCount = 1;

    $sheet->setCellValue('A' . $rowCount, "Stt");
    $sheet->setCellValue('B' . $rowCount, 'Mã Học Sinh');
    $sheet->setCellValue('C' . $rowCount, "Họ Và Tên");
    $sheet->setCellValue('D' . $rowCount, 'Thời Gian Đến (Ngày và Giờ)');
    $sheet->setCellValue('E' . $rowCount, 'Lớp');

    $sheet->getColumnDimension("A")->setAutoSize(true);
    $sheet->getColumnDimension("B")->setAutoSize(true);
    $sheet->getColumnDimension("C")->setAutoSize(true);
    $sheet->getColumnDimension("D")->setAutoSize(true);
    $sheet->getColumnDimension("E")->setAutoSize(true);

    $sheet->getStyle("A1:E1")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()->setARGB('eeffffee');

    $sheet->getStyle("A1:E1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    // Get the current date in the format 'Y-m-d'
    $currentDate = date('Y-m-d');

    // Assuming $conn is your database connection
    $result = mysqli_query($conn, "SELECT * FROM arrived WHERE arrival_date = '$currentDate'");
    
    if ($result->num_rows > 0) {
        // Generate HTML for table rows
        while ($row = $result->fetch_assoc()) {
            $rowCount++;
            $sheet->setCellValue("A" . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $row['ma_hoc_sinh']);
            $sheet->setCellValue('C' . $rowCount, $row['name']);
            $sheet->setCellValue('D' . $rowCount, $row['arrival_date']." ".$row['arrival_time']);
            
            // Fetch class from the hocsinh table
            $classResult = mysqli_query($conn, "SELECT lop FROM hocsinh WHERE ma_hoc_sinh = '".$row['ma_hoc_sinh']."'");
            $classRow = mysqli_fetch_assoc($classResult);
            $class = $classRow['lop'];

            $sheet->setCellValue('E' . $rowCount, $class);
        }
    }

    $styleArray = array(
        'borders' => array(
            'allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
        ),
    );

    $sheet->getStyle("A1:E" . $rowCount)->applyFromArray($styleArray);

    $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
    $filename = 'export_arrived_'.date("d/m/Y").'.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');
    $objWriter->save('php://output');
    exit;
}
// Close the prepared statement
$stmt->close();
?>
