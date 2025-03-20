<?php
session_start();
include 'includes/db_connect.php';

$MaSV = $_SESSION['MaSV']; // lấy mã SV từ phiên đăng nhập
$NgayDK = date('Y-m-d');

// thêm vào bảng DangKy
mysqli_query($conn, "INSERT INTO DangKy (NgayDK, MaSV) VALUES ('$NgayDK','$MaSV')");
$MaDK = mysqli_insert_id($conn);

// thêm vào ChiTietDangKy và cập nhật số lượng trong bảng HocPhan
foreach ($_SESSION['cart'] as $maHP) {
    mysqli_query($conn, "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES ('$MaDK','$maHP')");
    mysqli_query($conn, "UPDATE HocPhan SET SoLuong = SoLuong - 1 WHERE MaHP='$maHP'");
}

// xóa giỏ hàng sau khi lưu thành công
unset($_SESSION['cart']);

echo "<script>alert('Đăng ký học phần thành công!'); window.location='view_enrollment.php';</script>";
?>
// câu 6