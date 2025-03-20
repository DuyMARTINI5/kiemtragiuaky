<?php
session_start();
include 'includes/db_connect.php';
include 'includes/header.php';

// Xử lý xóa học phần khỏi giỏ hàng
if (isset($_GET['delete'])) {
    $key = $_GET['delete'];
    unset($_SESSION['cart'][$key]);
    header('Location: view_enrollment.php');
    exit();
}
?>

<h2>Giỏ hàng Học phần đã đăng ký</h2>

<form action="save_registration.php" method="post">
    <table border="1">
        <tr>
            <th>Mã HP</th>
            <th>Tên HP</th>
            <th>Số tín chỉ</th>
            <th>Xóa</th>
        </tr>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $key => $maHP): ?>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM HocPhan WHERE MaHP='$maHP'");
                $row = mysqli_fetch_assoc($query);
                ?>
                <tr>
                    <td><?= $row['MaHP']; ?></td>
                    <td><?= $row['TenHP']; ?></td>
                    <td><?= $row['SoTinChi']; ?></td>
                    <td>
                        <a href="?delete=<?= $key; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa học phần này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">Chưa có học phần nào trong giỏ hàng.</td></tr>
        <?php endif; ?>
    </table><br>

    <a href="courses.php"><button type="button">Quay lại thêm học phần</button></a>
    <?php if (!empty($_SESSION['cart'])): ?>
        <button type="submit">Xác nhận đăng ký</button>
    <?php endif; ?>
</form>

<?php include 'includes/footer.php'; ?>
