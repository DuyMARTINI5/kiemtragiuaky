<?php
session_start();
include 'includes/db_connect.php';
include 'includes/header.php';
?>

<h2>Học phần đã chọn</h2>
<form method="post" action="save_registration.php">
<table border="1">
    <tr>
        <th>Mã HP</th><th>Tên HP</th><th>Số tín chỉ</th><th>Xóa</th>
    </tr>
    <?php
    if(isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $maHP) {
            $query = mysqli_query($conn, "SELECT * FROM HocPhan WHERE MaHP='$maHP'");
            $row = mysqli_fetch_assoc($query);
    ?>
    <tr>
        <td><?= $row['MaHP']; ?></td>
        <td><?= $row['TenHP']; ?></td>
        <td><?= $row['SoTinChi']; ?></td>
        <td><a href="view_enrollment.php?delete=<?= $key; ?>">Xóa</a></td>
    </tr>
    <?php }} ?>
</table>
<br>
<button type="submit">Xác nhận đăng ký</button>
<a href="courses.php">Quay lại chọn thêm</a>
</form>

<?php
if(isset($_GET['delete'])) {
    unset($_SESSION['cart'][$_GET['delete']]);
    header('Location: view_enrollment.php');
}
include 'includes/footer.php';
?>
