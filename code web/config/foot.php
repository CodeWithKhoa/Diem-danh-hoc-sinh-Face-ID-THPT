      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <?=date("Y")?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
          </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sẵn sàng rời đi?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Chọn "Logout" bên dưới nếu bạn sẵn sàng kết thúc phiên hiện tại của mình.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

    <!-- Hiệu Ứng -->
    
  <script src="/js/hoa.js"></script>
  <!--- <script src="/js/tuyetroi.js"></script> --->

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>
  
    <!-- Page level plugins -->
  <script src="/vendor/chart.js/Chart.min.js"></script>
  <script src="/js/chart-pie.js"></script>

  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Script JavaScript sử dụng moment.js để cập nhật thông tin thời gian và ngày -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to update the header with the current date and time
            function updateHeader() {
                var currentDate = moment();
                moment.locale('vi'); // Đặt ngôn ngữ là tiếng Việt
                var formattedDate = currentDate.format('HH:mm:ss L');
                $("#datetime").text("(" + formattedDate + ")");
            }
        
            // Initial update
            updateHeader();
        
            // Periodically update the header every second
            setInterval(function() {
                updateHeader();
            }, 1000); // 1 second = 1000 milliseconds
        });
    </script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include jQuery UI -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
  // Check if the current URL matches the pattern '/service/arrived' or '/service/unarrived'
  var currentPath = window.location.pathname;
  var dataType = "arrived"; // Default value

  // Use regular expressions to check for the specified patterns
  var arrivedPattern = /^\/service\/arrived(?:\/|$)/;
  var unarrivedPattern = /^\/service\/unarrived(?:\/|$)/;

  if (arrivedPattern.test(currentPath)) {
    dataType = "arrived";
  } else if (unarrivedPattern.test(currentPath)) {
    dataType = "unarrived";
  } else {
    // If the current URL doesn't match the specified patterns, do nothing
    return;
  }

  // Rest of your code remains unchanged
  $("#datepicker").datepicker({
    dateFormat: 'yy-mm-dd',
    defaultDate: 0,
    onSelect: function(selectedDate) {
      fetchArrivedData(selectedDate, dataType);
    }
  });

  $("#changeDateBtn").on("click", function() {
    var selectedDate = $("#datepicker").val();
    fetchArrivedData(selectedDate, dataType);
  });

  function fetchArrivedData(selectedDate, dataType) {
    $.ajax({
      method: "GET",
      url: "/api/getArrivedData",
      data: { arrival_date: selectedDate, data_type: dataType },
      success: function(response) {
        $("#dataTable tbody").html(response);
      },
      error: function(xhr, status, error) {
        console.error("Error:", error);
        alert("Error occurred. Check the console for details.");
      }
    });
  }

  $("#datepicker").datepicker("setDate", new Date());
  var selectedDate = $("#datepicker").val();
  fetchArrivedData(selectedDate, dataType);
});

</script>



<script>
$(document).ready(function() {
    // Function to add a member
    $("#addMemberBtn").on("click", function() {
        var maHocSinh = prompt("Nhập mã học sinh:");
        var hoVaTen = prompt("Nhập họ và tên:");
        var ngaySinh = prompt("Nhập ngày sinh (Y-m-d):");
        var lop = prompt("Nhập lớp:");

        // Send data to the server to insert into the database
        $.ajax({
            method: "POST",
            url: "/api/edit.php", // Replace with your server-side script
            data: { action: "add", ma_hoc_sinh: maHocSinh, hovaten: hoVaTen, ngaysinh: ngaySinh, lop: lop },
            success: function(response) {
                console.log("Success:", response);
                alert(response);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                alert("Error occurred. Check the console for details.");
            }
        });
    });

    // Function to edit a member
    $("#editMemberBtn").on("click", function() {
        var memberId = prompt("Nhập Mã Học Sinh Cần Sửa:");
        var newMaHocSinh = prompt("Nhập mã học sinh mới:");
        var newHoVaTen = prompt("Nhập họ và tên mới:");
        var newNgaySinh = prompt("Nhập ngày sinh mới (Y-m-d):");
        var newLop = prompt("Nhập lớp mới:");

        // Send data to the server to update in the database
        $.ajax({
            method: "POST",
            url: "/api/edit.php", // Replace with your server-side script
            data: { action: "edit", ma_old: memberId, ma_hoc_sinh: newMaHocSinh, hovaten: newHoVaTen, ngaysinh: newNgaySinh, lop: newLop },
            success: function(response) {
                console.log("Success:", response);
                alert(response);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                alert("Error occurred. Check the console for details.");
            }
        });
    });

    // Function to delete a member
    $("#delMemberBtn").on("click", function() {
        var memberId = prompt("Nhập Mã Học Sinh Cần Xóa:");

        // Send data to the server to delete from the database
        $.ajax({
            method: "POST",
            url: "/api/edit.php", // Replace with your server-side script
            data: { action: "delete", mahs: memberId },
            success: function(response) {
                console.log("Success:", response);
                alert(response);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                alert("Error occurred. Check the console for details.");
            }
        });
    });
});
</script>
<!--- Search --->

<script>
    $(document).ready(function() {
        // Sự kiện khi click vào button Tìm kiếm
        $("#searchBtn").on("click", function() {
            var searchText = $("#searchInput").val().toLowerCase();

            // Lặp qua các dòng trong bảng để tìm kiếm
            $("#dataTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
            });
        });
    });
</script>
