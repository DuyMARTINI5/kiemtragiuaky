<?php 
include 'includes/db_connect.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $MaSV = $_POST['MaSV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $MaNganh = $_POST['MaNganh'];

    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($_FILES["Hinh"]["name"]);
    move_uploaded_file($_FILES["Hinh"]["tmp_name"], $target_file);

    $sql = "INSERT INTO SinhVien (MaSV,HoTen,GioiTinh,NgaySinh,Hinh,MaNganh) 
            VALUES ('$MaSV','$HoTen','$GioiTinh','$NgaySinh','".basename($_FILES["Hinh"]["name"])."','$MaNganh')";

    mysqli_query($conn, $sql);
    header('Location: index.php');
}
?>

<h2>Thêm sinh viên</h2>
<form method="post" enctype="multipart/form-data">
    Mã SV: <input type="text" name="MaSV" required><br>
    Họ tên: <input type="text" name="HoTen" required><br>
    Giới tính: 
    <select name="GioiTinh">
        <option>Nam</option>
        <option>Nữ</option>
    </select><br>
    Ngày sinh: <input type="date" name="NgaySinh" required><br>
    Mã ngành: <input type="text" name="MaNganh" required><br>
    Hình ảnh: <input type="file" name="fileToUpload" required><br>
    <button type="submit">Thêm</button>
</form>

<?php include 'includes/footer.php'; ?>
// câu 1 