<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>
        <div class="form-group">
            <button id="addMemberBtn" class="btn btn-primary mb-2">Thêm</button>
            <button id="editMemberBtn" class="btn btn-primary mb-2">Sửa</button>
            <button id="delMemberBtn" class="btn btn-primary mb-2">Xóa</button>
            <a class="btn btn-info float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#AddFileExel">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                Thêm danh sách học sinh mới
            </a>
            <!-- Add File EXEL Modal-->
            <div class="modal fade" id="AddFileExel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form class="modal-content" method="POST" action="/api/excel.php" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-plus"></i> Thêm danh sách học sinh</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                            <div class="modal-footer">
                            <div id="successMessage" class="alert alert-success" style="display: none;">
                                File Excel đã được tải thành công!
                            </div>
                            <input class="btn btn-success" type="file" id="fileInput" name="file">
                            <button class="btn btn-success" type="button" onclick="uploadExcel()">Upload</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="form-group">
            <label for="searchInput">Tìm kiếm:</label>
            <input type="text" class="form-control" id="searchInput" placeholder="Nhập Tên Học Sinh Cần Tìm">
            <button id="searchBtn" class="btn btn-primary mt-2">Tìm kiếm</button>
        </div>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Danh sách các thành viên trong trường</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID </th>
                      <th>Mã Học Sinh</th>
                      <th>Học Và Tên</th>
                      <th>Ngày Sinh</th>
                      <th>Lớp</th>
                    </tr>
                  </thead>
                <!-- Tiêu đề ở cuối bảng
                <tfoot>
                    <tr>
                      <th>ID </th>
                      <th>Mã Học Sinh</th>
                      <th>Học Và Tên</th>
                      <th>Ngày Sinh</th>
                      <th>Lớp</th>
                    </tr>
                  </tfoot>
                  <tbody>
                --->
                    <?php $sql = "SELECT * FROM hocsinh";
                    
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        $stt = 0;
                        // Hiển thị dữ liệu từ cơ sở dữ liệu trong bảng HTML
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . ++$stt . "</td>";
                            echo "<td>" . $row['ma_hoc_sinh'] . "</td>";
                            echo "<td>" . $row['hovaten'] . "</td>"; 
                            echo "<td>" . $row['ngaysinh'] . "</td>"; 
                            echo "<td>" . $row['lop'] . "</td>"; 
                            echo "</tr>";
                        }
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
function uploadExcel() {
    var formData = new FormData();
    formData.append('file', document.getElementById('fileInput').files[0]);

    fetch('/api/excel.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Xử lý dữ liệu trả về từ API

        if (data.success) {
            document.getElementById('successMessage').style.display = 'block';
            document.getElementById('fileInput').style.display = 'none';
            document.querySelector('.modal-footer button').style.display = 'none';

            // Tải lại trang sau một khoảng thời gian (ví dụ: sau 2 giây)
            setTimeout(function () {
                location.reload();
            }, 2000);
        } else {
            console.error('Error:', data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
</body>

</html>
