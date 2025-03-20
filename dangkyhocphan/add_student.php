<?php 
include 'includes/db_connect.php';
include 'includes/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $MaSV = $_POST['MaSV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $MaNganh = $_POST['MaNganh'];

    $sql = "INSERT INTO SinhVien (MaSV,HoTen,GioiTinh,NgaySinh,MaNganh) 
            VALUES ('$MaSV','$HoTen','$GioiTinh','$NgaySinh','$MaNganh')";

    mysqli_query($conn, $sql);
    header('Location: index.php');
}
?>

<h2>Thêm sinh viên</h2>
<form method="post">
    Mã SV: <input type="text" name="MaSV" required><br>
    Họ tên: <input type="text" name="HoTen" required><br>
    Giới tính: 
    <select name="GioiTinh">
        <option>Nam</option>
        <option>Nữ</option>
    </select><br>
    Ngày sinh: <input type="date" name="NgaySinh" required><br>
    Mã ngành: <input type="text" name="MaNganh" required><br>
    <button type="submit">Thêm</button>
</form>

<?php include 'includes/footer.php'; ?>
