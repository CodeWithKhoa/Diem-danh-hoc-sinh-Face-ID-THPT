$("#dataTable").DataTable({
  info: true,
  searching: true,
  bProcessing: true,
  paging: true,
  //"serverSide": true,

  columns: [
    //{ "data": "id", "orderable": false, "visible": false },
    {
      data: "masv",
      orderable: true,
    },
    {
      data: "hoten",
      orderable: true,
    },
    {
      data: "ngaysinh",
      orderable: true,

      //render: $.fn.dataTable.render.date
    },
    {
      data: "gioitinh",
      orderable: false,
    },
    {
      data: "diachi",
      orderable: false,
    },
    {
      data: "malop",
      orderable: true,
    },
  ],
  language: {
    search: "Tìm kiếm",
    emptyTable: "không có dữ liệu trong bảng",
    info: "Hiển thị _START_ - _END_ / _TOTAL_ kết quả",
    infoEmpty: "Hiển thị 0 đến 0 của 0 kết quả",
    infoFiltered: "(lọc từ _MAX_ tổng kết quả)",
    infoPostFix: "",
    thousands: ",",
    lengthMenu: "Hiển thị _MENU_ kết quả",
    loadingRecords: "Loading...",
    processing: "Đang nạp dữ liệu...",

    zeroRecords: "Không tìm thấy kết quả",
    paginate: {
      first: "Trang đầu",
      last: "Trang cuối",
      next: "Trang kế",
      previous: "Trang trước",
    },
    aria: {
      sortAscending: ": activate to sort column ascending",
      sortDescending: ": activate to sort column descending",
    },
  },
});

$("#dataDP").DataTable({
  info: true,
  searching: true,
  bProcessing: true,
  paging: true,
  //"serverSide": true,

  columns: [
    //{ "data": "id", "orderable": false, "visible": false },
    {
      data: "masv",
      orderable: true,
    },
    {
      data: "hoten",
      orderable: true,
    },
    {
      data: "sotien",
      orderable: true,

      //render: $.fn.dataTable.render.date
    },
    {
      data: "ngaythu",
      orderable: false,
    },
    {
      data: "trangthai",
      orderable: false,
    },
  ],
  language: {
    search: "Tìm kiếm",
    emptyTable: "không có dữ liệu trong bảng",
    info: "Hiển thị _START_ - _END_ / _TOTAL_ kết quả",
    infoEmpty: "Hiển thị 0 đến 0 của 0 kết quả",
    infoFiltered: "(lọc từ _MAX_ tổng kết quả)",
    infoPostFix: "",
    thousands: ",",
    lengthMenu: "Hiển thị _MENU_ kết quả",
    loadingRecords: "Loading...",
    processing: "Đang nạp dữ liệu...",

    zeroRecords: "Không tìm thấy kết quả",
    paginate: {
      first: "Trang đầu",
      last: "Trang cuối",
      next: "Trang kế",
      previous: "Trang trước",
    },
    aria: {
      sortAscending: ": activate to sort column ascending",
      sortDescending: ": activate to sort column descending",
    },
  },
});
$("#dataDR").DataTable({
  info: true,
  searching: false,
  bProcessing: false,
  paging: true,
  //"serverSide": true,

  columns: [
    //{ "data": "id", "orderable": false, "visible": false },

    {
      data: "masv",
      orderable: true,
    },
    {
      data: "hoten",
      orderable: true,
    },
    {
      data: "diem",
      orderable: true,
      //render: $.fn.dataTable.render.date
    },
    {
      data: "namhoc",
      orderable: true,
    },
    {
      data: "hocky",
      orderable: true,
    },
    {
      data: "malop",
      orderable: true,
    },
  ],
  language: {
    search: "Tìm kiếm",
    emptyTable: "không có dữ liệu trong bảng",
    info: "Hiển thị _START_ - _END_ / _TOTAL_ kết quả",
    infoEmpty: "Hiển thị 0 đến 0 của 0 kết quả",
    infoFiltered: "(lọc từ _MAX_ tổng kết quả)",
    infoPostFix: "",
    thousands: ",",
    lengthMenu: "Hiển thị _MENU_ kết quả",
    loadingRecords: "Loading...",
    processing: "Đang nạp dữ liệu...",

    zeroRecords: "Không tìm thấy kết quả",
    paginate: {
      first: "Trang đầu",
      last: "Trang cuối",
      next: "Trang kế",
      previous: "Trang trước",
    },
    aria: {
      sortAscending: ": activate to sort column ascending",
      sortDescending: ": activate to sort column descending",
    },
  },
});

$("#datasd").DataTable({
  info: true,
  searching: true,
  bProcessing: false,
  paging: true,
  //"serverSide": true,

  columns: [
    //{ "data": "id", "orderable": false, "visible": false },

    {
      data: "masv",
      orderable: true,
    },
    {
      data: "hoten",
      orderable: true,
    },
    {
      data: "trangthai",
      orderable: true,
      //render: $.fn.dataTable.render.date
    },
    {
      data: "lop",
      orderable: true,
    },
    {
      data: "ghichu",
      orderable: true,
    },
  ],
  language: {
    search: "Tìm kiếm",
    emptyTable: "không có dữ liệu trong bảng",
    info: "Hiển thị _START_ - _END_ / _TOTAL_ kết quả",
    infoEmpty: "Hiển thị 0 đến 0 của 0 kết quả",
    infoFiltered: "(lọc từ _MAX_ tổng kết quả)",
    infoPostFix: "",
    thousands: ",",
    lengthMenu: "Hiển thị _MENU_ kết quả",
    loadingRecords: "Loading...",
    processing: "Đang nạp dữ liệu...",

    zeroRecords: "Không tìm thấy kết quả",
    paginate: {
      first: "Trang đầu",
      last: "Trang cuối",
      next: "Trang kế",
      previous: "Trang trước",
    },
    aria: {
      sortAscending: ": activate to sort column ascending",
      sortDescending: ": activate to sort column descending",
    },
  },
});

$("#dataDMLop").DataTable({
  info: true,
  searching: true,
  bProcessing: true,
  paging: true,
  //"serverSide": true,

  columns: [
    //{ "data": "id", "orderable": false, "visible": false },
    {
      data: "malop",
      orderable: true,
    },
    {
      data: "tenlop",
      orderable: true,
    },
  ],
  language: {
    search: "Tìm kiếm",
    emptyTable: "không có dữ liệu trong bảng",
    info: "Hiển thị _START_ - _END_ / _TOTAL_ kết quả",
    infoEmpty: "Hiển thị 0 đến 0 của 0 kết quả",
    infoFiltered: "(lọc từ _MAX_ tổng kết quả)",
    infoPostFix: "",
    thousands: ",",
    lengthMenu: "Hiển thị _MENU_ kết quả",
    loadingRecords: "Loading...",
    processing: "Đang nạp dữ liệu...",

    zeroRecords: "Không tìm thấy kết quả",
    paginate: {
      first: "Trang đầu",
      last: "Trang cuối",
      next: "Trang kế",
      previous: "Trang trước",
    },
    aria: {
      sortAscending: ": activate to sort column ascending",
      sortDescending: ": activate to sort column descending",
    },
  },
});

$("#dataYC").DataTable({
  info: true,
  searching: true,
  bProcessing: true,
  paging: true,
  //"serverSide": true,

  columns: [
    //{ "data": "id", "orderable": false, "visible": false },
    {
      data: "masv",
      orderable: true,
    },
    {
      data: "hoten",
      orderable: true,
    },
    {
      data: "lop",
      orderable: true,
    },
    {
      data: "ngayyeucau",
      orderable: true,
    },
    {
      data: "trangthai",
      orderable: true,
    },
  ],
  language: {
    search: "Tìm kiếm",
    emptyTable: "không có dữ liệu trong bảng",
    info: "Hiển thị _START_ - _END_ / _TOTAL_ kết quả",
    infoEmpty: "Hiển thị 0 đến 0 của 0 kết quả",
    infoFiltered: "(lọc từ _MAX_ tổng kết quả)",
    infoPostFix: "",
    thousands: ",",
    lengthMenu: "Hiển thị _MENU_ kết quả",
    loadingRecords: "Loading...",
    processing: "Đang nạp dữ liệu...",

    zeroRecords: "Không tìm thấy kết quả",
    paginate: {
      first: "Trang đầu",
      last: "Trang cuối",
      next: "Trang kế",
      previous: "Trang trước",
    },
    aria: {
      sortAscending: ": activate to sort column ascending",
      sortDescending: ": activate to sort column descending",
    },
  },
});

$("#select_org").on("change", function () {
  // var values = $(this).serialize();
  var values = $(this).val();
  $.ajax({
    url: "mics/loadlistbyorg.php",
    method: "POST",
    data: {
      id: values,
    },
    success: function (data) {
      //alert(data);
      $("#show_list_by_org").html(data);
    },
  });
});
$("#select_donvi").on("change", function () {
  // var values = $(this).serialize();
  var values = $(this).val();
  $.ajax({
    url: "mics/loadlistbydonvi.php",
    method: "POST",
    data: {
      id: values,
    },
    success: function (data) {
      //alert(data);
      $("#show_list_by_donvi").html(data);
    },
  });
});
$("#select_chapter").on("change", function () {
  // var values = $(this).serialize();
  var chapter_value = $(this).val();
  $.ajax({
    url: "mics/loadlistbychapter.php",
    method: "POST",
    data: {
      id: chapter_value,
    },
    success: function (data) {
      // alert(data);

      $("#show_list_by_chapter").html(data);
    },
  });
});

$("#donvi_lop").on("change", function () {
  // var values = $(this).serialize();
  var values = $(this).val();
  alert(values);
  // $.ajax({
  //     url: 'mics/loadcomboboxlopbydonvi.php',
  //     method: "POST",
  //     data: {
  //         id: values
  //     },
  //     success: function (data) {
  //         //alert(data);
  //         $('#select_org').html(data);
  //     }
  // });
});

$("#btnRutsodoan").on("click", function () {
  // var values = $(this).serialize();
  var values = $("#masinhvien").val();
  $("#idDel").val(values);
  $.ajax({
    url: "mics/laytensinhvien.php",
    method: "POST",
    data: {
      id: values,
    },
    success: function (data) {
      //alert(data);
      $("#nameRut").html(data);
    },
  });
});
