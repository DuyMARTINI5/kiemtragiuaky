<?php
session_start();
include 'includes/db_connect.php';
include 'includes/header.php';

// Câu 2: Hiển thị danh sách học phần để sinh viên đăng ký
$sql = "SELECT * FROM HocPhan WHERE SoLuong > 0";
$result = mysqli_query($conn, $sql);
?>

<h2>Danh sách học phần</h2>
<form method="post" action="enroll.php">
    <table border="1">
        <tr>
            <th>Chọn</th>
            <th>Mã HP</th>
            <th>Tên học phần</th>
            <th>Số tín chỉ</th>
            <th>Số lượng còn lại</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><input type="checkbox" name="hocphan[]" value="<?= $row['MaHP']; ?>"></td>
            <td><?= $row['MaHP']; ?></td>
            <td><?= $row['TenHP']; ?></td>
            <td><?= $row['SoTinChi']; ?></td>
            <td><?= $row['SoLuong']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table><br>
    <button type="submit">Thêm vào giỏ hàng</button>
</form>

<?php include 'includes/footer.php'; ?>
