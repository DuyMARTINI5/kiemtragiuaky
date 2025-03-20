<?php
session_start();
include 'includes/db_connect.php';

$MaSV = '0123456789'; // tạm thời dùng mã SV cố định, có thể thay bằng mã SV từ phiên đăng nhập.
$NgayDK = date('Y-m-d');

mysqli_query($conn, "INSERT INTO DangKy (NgayDK, MaSV) VALUES ('$NgayDK', '$MaSV')");
$MaDK = mysqli_insert_id($conn);

foreach ($_SESSION['cart'] as $maHP) {
    mysqli_query($conn, "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES ('$MaDK', '$maHP')");
    // cập nhật số lượng học phần
    mysqli_query($conn, "UPDATE HocPhan SET SoLuong=SoLuong-1 WHERE MaHP='$maHP'");
}

// Xóa giỏ hàng sau khi đăng ký xong
unset($_SESSION['cart']);

echo "<script>alert('Đăng ký thành công!'); window.location='view_enrollment.php';</script>";
?>
