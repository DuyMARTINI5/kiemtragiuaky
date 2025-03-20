<?php 
include 'includes/db_connect.php';
include 'includes/header.php';

$MaSV = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM SinhVien WHERE MaSV='$MaSV'");
$row = mysqli_fetch_assoc($result);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];

    $sql = "UPDATE SinhVien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh' WHERE MaSV='$MaSV'";
    mysqli_query($conn, $sql);
    header('Location: index.php');
}
?>

<h2>Sửa sinh viên</h2>
<form method="post">
    Họ tên: <input type="text" name="HoTen" value="<?= $row['HoTen']; ?>"><br>
    Giới tính: 
    <select name="GioiTinh">
        <option <?= ($row['GioiTinh']=='Nam')?'selected':'' ?>>Nam</option>
        <option <?= ($row['GioiTinh']=='Nữ')?'selected':'' ?>>Nữ</option>
    </select><br>
    Ngày sinh: <input type="date" name="NgaySinh" value="<?= $row['NgaySinh']; ?>"><br>
    <button type="submit">Cập nhật</button>
</form>

<?php include 'includes/footer.php'; ?>
