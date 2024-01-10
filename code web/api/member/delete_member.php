<!-- Form Xoá thành viên -->
<form action="process_member.php" method="post">
    <input type="hidden" name="action" value="delete">
    <label for="id_xoa">ID:</label>
    <input type="text" name="id_xoa" required>
    
    <input type="submit" value="Xoá">
</form>
