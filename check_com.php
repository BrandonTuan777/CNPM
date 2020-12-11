<?php
require_once('connection.php');
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: dang-nhap.php');
}
?>
<?php
require_once('connection.php');
?>
<?php
// new comment
$conn = connection();
if(isset($_POST['new_comment'])) {
    $new_com_name = $_SESSION['username'];
    $new_com_text = $_POST['comment'];
    $new_com_date = date('Y-m-d H:i:s');
    $new_com_code = generateRandomString();
    $new_com_id_room = $_GET['ID'];
    if(isset($new_com_text)) {
        mysqli_query($conn, "INSERT INTO `parents` (`user`, `text`, `date`, `code`,`id_room`) VALUES
 ('$new_com_name', '$new_com_text', '$new_com_date', '$new_com_code','$new_com_id_room')");
    }

}
// new reply
if(isset($_POST['new_reply'])) {
    $new_reply_name = $_SESSION['username'];
    $new_reply_text = $_POST['new-reply'];
    $new_reply_date = date('Y-m-d H:i:s');
    $new_reply_code = $_POST['code'];

    if(isset($new_reply_text)) {
        mysqli_query($conn, "INSERT INTO `children` (`user`, `text`, `date`, `par_code`) VALUES ('$new_reply_name', '$new_reply_text', '$new_reply_date', '$new_reply_code')") or die(mysqli_error());
    }
}
?>