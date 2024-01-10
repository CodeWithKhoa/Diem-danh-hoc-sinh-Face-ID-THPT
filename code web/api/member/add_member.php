<!-- Form Thêm thành viên -->
<form action="process_member.php" method="post">
    <input type="hidden" name="action" value="add">
    <label for="ma_hoc_sinh">Mã Học Sinh:</label>
    <input type="text" name="ma_hoc_sinh" required>
    
    <label for="hovaten">Họ và Tên:</label>
    <input type="text" name="hovaten" required>
    
    <label for="ngaysinh">Ngày Sinh:</label>
    <input type="date" name="ngaysinh" required>
    
    <label for="lop">Lớp:</label>
    <input type="text" name="lop" required>

    <input type="submit" value="Thêm">
</form>
