<?php
include 'includes/db_connect.php';
include 'includes/header.php';

$sql = "SELECT * FROM HocPhan";
$result = mysqli_query($conn, $sql);
?>

<h2>Danh sách học phần</h2>
<form method="post" action="enroll.php">
  <table border="1">
    <tr>
      <th>Chọn</th><th>Mã HP</th><th>Tên HP</th><th>Số tín chỉ</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><input type="checkbox" name="hocphan[]" value="<?= $row['MaHP']; ?>"></td>
      <td><?= $row['MaHP']; ?></td>
      <td><?= $row['TenHP']; ?></td>
      <td><?= $row['SoTinChi']; ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
  <br>
  <button type="submit">Đăng ký học phần</button>
</form>

<?php include 'includes/footer.php'; ?>
