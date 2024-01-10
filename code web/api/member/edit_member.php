<!-- Form Sửa thành viên -->
<form action="process_member.php" method="post">
    <input type="hidden" name="action" value="edit">
    <label for="id_sua">ID:</label>
    <input type="text" name="id_sua" required>

    <label for="ma_hoc_sinh_sua">Mã Học Sinh:</label>
    <input type="text" name="ma_hoc_sinh_sua" required>
    
    <label for="hovaten_sua">Họ và Tên:</label>
    <input type="text" name="hovaten_sua" required>
    
    <label for="ngaysinh_sua">Ngày Sinh:</label>
    <input type="date" name="ngaysinh_sua" required>
    
    <label for="lop_sua">Lớp:</label>
    <input type="text" name="lop_sua" required>

    <input type="submit" value="Sửa">
</form>
