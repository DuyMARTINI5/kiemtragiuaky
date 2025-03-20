<?php
session_start();
include 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST['MaSV'];
    $NgaySinh = $_POST['NgaySinh'];

    $sql = "SELECT * FROM SinhVien WHERE MaSV='$MaSV' AND NgaySinh='$NgaySinh'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['MaSV'] = $MaSV;
        header("Location: courses.php");
    } else {
        $error = "Sai mã sinh viên hoặc ngày sinh!";
    }
}
include 'includes/header.php';
?>

<h2>Đăng nhập Sinh viên</h2>
<form method="post">
    Mã Sinh viên: <input type="text" name="MaSV" required><br>
    Ngày sinh: <input type="date" name="NgaySinh" required><br>
    <button type="submit">Đăng nhập</button>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>

<?php include 'includes/footer.php'; ?>
