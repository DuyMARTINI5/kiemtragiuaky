<?php
session_start();
include 'includes/db_connect.php';
include 'includes/header.php';

if (!isset($_SESSION['MaSV'])) {
    header('Location: login.php');
    exit();
}

$MaSV = $_SESSION['MaSV'];
$sql = "SELECT * FROM SinhVien WHERE MaSV='$MaSV'";
$result = mysqli_query($conn, $sql);
$sv = mysqli_fetch_assoc($result);
?>

<h2>Chào mừng, <?= $sv['HoTen']; ?></h2>
<ul>
    <li><strong>Mã SV:</strong> <?= $sv['MaSV']; ?></li>
    <li><strong>Giới tính:</strong> <?= $sv['GioiTinh']; ?></li>
    <li><strong>Ngày sinh:</strong> <?= $sv['NgaySinh']; ?></li>
    <li><strong>Ngành học:</strong> <?= $sv['MaNganh']; ?></li>
</ul>

<a href="courses.php">Đăng ký học phần</a><br>
<a href="view_enrollment.php">Xem học phần đã đăng ký</a><br>
<a href="logout.php">Đăng xuất</a>

<?php include 'includes/footer.php'; ?>

