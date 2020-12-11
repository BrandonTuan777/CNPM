<?php
session_start();
require_once('connection.php');

//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: dang-nhap.php');
}
?>

<?php
    $username==$row2['username'];
    $conn = connection();
    $sql = "DELETE FROM danhsach WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$username);
    header('Location: subject.php');
?>
