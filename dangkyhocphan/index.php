<?php 
include 'includes/db_connect.php';
include 'includes/header.php'; 
?>

<!-- CÂU 1: CRUD SINH VIÊN (Danh sách Sinh viên đầy đủ) -->

<h2>Danh sách Sinh viên</h2>
<a href="add_student.php"><button>➕ Thêm sinh viên mới</button></a><br><br>

<table border="1">
    <tr>
        <th>Mã SV</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Chi tiết</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php
    // lấy dữ liệu từ bảng SinhVien
    $sql = "SELECT * FROM SinhVien";
    $query = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($query)):
    ?>
        <tr>
            <td><?= $row['MaSV']; ?></td>
            <td><?= $row['HoTen']; ?></td>
            <td><?= $row['GioiTinh']; ?></td>
            <td><?= date("d/m/Y", strtotime($row['NgaySinh'])); ?></td>
            <td><a href="view_student.php?id=<?= $row['MaSV']; ?>">🔍 Chi tiết</a></td>
            <td><a href="edit_student.php?id=<?= $row['MaSV']; ?>">✏️ Sửa</a></td>
            <td><a href="delete_student.php?id=<?= $row['MaSV']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa sinh viên này không?')">🗑️ Xóa</a></td>
        </tr>
    <?php endwhile; ?>
</table>

<?php include 'includes/footer.php'; ?>
