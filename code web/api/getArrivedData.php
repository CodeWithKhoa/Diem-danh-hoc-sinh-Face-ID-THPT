<?php
// Include your database connection file
include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

// Get parameters from the AJAX request
$arrivalDate = $_GET['arrival_date'];
$dataType = $_GET['data_type'];

// Initialize output variable
$output = "";

// Fetch data based on data type
if ($dataType === "arrived") {
    // Existing "arrived" logic remains unchanged
    $sql = "SELECT * FROM arrived WHERE arrival_date = '$arrivalDate'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $stt = 0;
    
        // Generate HTML for table rows
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . ++$stt . "</td>";
            $output .= "<td>" . $row['ma_hoc_sinh'] . "</td>";
            $output .= "<td>" . $row['name'] . "</td>";
            $output .= "<td>" . $row['arrival_time'] . "</td>";
            $output .= "<td>" . $row['arrival_date'] . "</td>";
            $output .= "</tr>";
        }
    } else {
        $output = "<tr><td colspan='5'>No data found</td></tr>";
    }
    
    // Return the generated HTML
    echo $output;
} elseif ($dataType === "unarrived") {
    // New logic for "unarrived"
    $sql = "SELECT h.ma_hoc_sinh, h.hovaten, h.ngaysinh, h.lop
            FROM hocsinh h
            WHERE NOT EXISTS (
                SELECT 1 FROM arrived a 
                WHERE a.ma_hoc_sinh = h.ma_hoc_sinh AND a.arrival_date = ?
            )";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $arrivalDate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stt = 0;
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td>" . ++$stt . "</td>";
            $output .= "<td>" . $row['ma_hoc_sinh'] . "</td>";
            $output .= "<td>" . $row['hovaten'] . "</td>";
            $output .= "<td>" . $row['ngaysinh'] . "</td>";
            $output .= "<td>" . $row['lop'] . "</td>";
            $output .= "</tr>";
        }
    } else {
        $output = "<tr><td colspan='5'>No data found</td></tr>";
    }    
    // Return the generated HTML
    echo $output;
} else {
    die;
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>
