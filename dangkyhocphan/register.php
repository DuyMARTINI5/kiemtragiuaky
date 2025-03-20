<?php
include 'includes/db_connect.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $MaSV = $_POST['MaSV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $MaNganh = $_POST['MaNganh'];

    // Kiểm tra trùng mã sinh viên
    $check = mysqli_query($conn, "SELECT * FROM SinhVien WHERE MaSV='$MaSV'");
    if(mysqli_num_rows($check) > 0) {
        $error = "Mã sinh viên đã tồn tại!";
    } else {
        $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, MaNganh)
                VALUES ('$MaSV', '$HoTen', '$GioiTinh', '$NgaySinh', '$MaNganh')";
        mysqli_query($conn, $sql);
        echo "<script>alert('Đăng ký tài khoản thành công! Vui lòng đăng nhập.'); window.location='login.php';</script>";
        exit();
    }
}
?>

<div class="form-container">
    <h2>Đăng ký tài khoản sinh viên</h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="post">
        Mã sinh viên: <input type="text" name="MaSV" required><br>
        Họ và tên: <input type="text" name="HoTen" required><br>
        Giới tính:
        <select name="GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br>
        Ngày sinh: <input type="date" name="NgaySinh" required><br>
        Mã ngành: <input type="text" name="MaNganh" required><br>
        <button type="submit">Đăng ký</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
