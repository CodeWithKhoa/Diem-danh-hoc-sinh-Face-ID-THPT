<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <div class="form-group">
        <div class="form-group">
            <a class="btn btn-success mt-2" onclick="exportToExcel()">Xuất Excel</a>
        </div>
        <label for="searchInput">Tìm kiếm:</label>
        <input type="text" class="form-control" id="searchInput" placeholder="Nhập Tên Học Sinh Cần Tìm">
        <button id="searchBtn" class="btn btn-primary mt-2">Tìm kiếm</button>
    </div>

    <br>
    <div class="form-group">
        <label for="datepicker">Chọn Ngày:</label>
        <input type="text" class="form-control" id="datepicker">
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 id="timeundrrived" class="m-0 font-weight-bold text-primary">Danh sách các học sinh chưa đến <span id="datetime"></span></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã Học Sinh</th>
                            <th>Học Và Tên</th>
                            <th>Ngày Sinh</th>
                            <th>Lớp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $today = date("Y-m-d");
                            
                            $sql = "SELECT DISTINCT h.ma_hoc_sinh, h.hovaten, h.ngaysinh, h.lop
                                    FROM hocsinh h
                                    LEFT JOIN arrived a ON h.ma_hoc_sinh = a.ma_hoc_sinh
                                    WHERE (a.arrival_date IS NULL OR a.arrival_date < '$today') AND (a.arrival_date IS NULL OR DATE(a.arrival_date) = '$today')";
    
                            $result = $conn->query($sql);
    
                            if ($result->num_rows > 0) {
                                $stt = 0;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . ++$stt . "</td>";
                                    echo "<td>" . $row['ma_hoc_sinh'] . "</td>";
                                    echo "<td>" . $row['hovaten'] . "</td>";
                                    echo "<td>" . $row['ngaysinh'] . "</td>";
                                    echo "<td>" . $row['lop'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No data found</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';
?>
<script>
    function exportToExcel() {
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "/api/ExportExcel.php");

        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", "DownloadUnarrived");
        input.setAttribute("value", "1");

        form.appendChild(input);
        document.body.appendChild(form);

        form.submit();
        document.body.removeChild(form);
    }
</script>


</body>
</html>
