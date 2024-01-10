<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng Số </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="tong">Loading... </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Đã Đến</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"id="da_den">Loading...</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Chưa Đến</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"id="chua_den">Loading...</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <script>
            // Lấy dữ liệu từ API
            fetch("https://" + window.location.host + "/api/soluong")
                .then(response => response.json())
                .then(data => {
                    // Cập nhật giá trị trong thẻ card
                    document.getElementById("tong").textContent = data[0];
                     document.getElementById("da_den").textContent = data[1];
                     document.getElementById("chua_den").textContent = data[2];
                })
                .catch(error => console.error('Lỗi khi lấy dữ liệu từ API:', error));
        </script>

          <!-- Content Row -->

          <div class="row">

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tỷ Lệ Học Sinh: </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart" width="400" height="400"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Học Sinh Đã Đến
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Học Sinh Chưa Đến
                    </span>
                  </div>
                </div>
              </div>
            </div>
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

</body>

</html>
