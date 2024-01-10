<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin 2 - Login</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" id="loginForm">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-user btn-block" onclick="submitForm()">
                      Login
                    </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Custom script for AJAX login -->
  <script>
    function submitForm() {
      // Lấy dữ liệu từ form
      var email = document.getElementById('exampleInputEmail').value;
      var password = document.getElementById('exampleInputPassword').value;

      // Tạo đối tượng XMLHttpRequest
      var xhr = new XMLHttpRequest();

      // Thiết lập phương thức và đường dẫn cho yêu cầu
      xhr.open('POST', '/api/login', true);

      // Thiết lập tiêu đề yêu cầu
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      // Định dạng dữ liệu để gửi đi
      var data = 'email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password);

      // Xử lý sự kiện khi yêu cầu được gửi đi
      xhr.onload = function() {
        if (xhr.status === 200) {
          // Kiểm tra kết quả từ API
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
            // Chuyển hướng đến trang thành công hoặc thực hiện các thao tác khác
            window.location.href = '/';
          } else {
            // Xử lý khi đăng nhập không thành công
            alert('Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.');
          }
        }
      };

      // Gửi yêu cầu đi
      xhr.send(data);
    }
  </script>
</body>

</html>
