<?php
session_start();

?>


<?php 
//Gọi file connection.php ở bài trước
require_once("connection.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST["btn_submit"])) {
	// lấy thông tin người dùng
	$username = $_POST["username"];
  $password = $_POST["password"];
  
	//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
	//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($username == "" || $password =="") {
		echo "username hoặc password bạn không được để trống!";
	}else{
		$sql = "select * from users where username = '$username' ";
		$query = mysqli_query($conn,$sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows==0) {
			echo "tài khoản không đúng!";
		}else{
      echo "ddungs roi do";
			// Lấy ra thông tin người dùng và lưu vào session
			while ( $data = mysqli_fetch_array($query) ) {
        $hash = $data["password"];
        // kiểm tra mật khẩu gốc với mật khẩu đã được hash
        
        if (password_verify($password, $hash)) {
          
          $_SESSION["user_id"] = $data["id"];
          $_SESSION['username'] = $data["username"];
          $_SESSION["email"] = $data["email"];
          $_SESSION["fullname"] = $data["fullname"];
          $_SESSION["is_block"] = $data["is_block"];
          $_SESSION["phone"] = $data["phone"];
          $_SESSION["permision"] = $data["permision"];
          
          // Thực thi hành động sau khi lưu thông tin vào session
          // tiến hành chuyển hướng trang web tới một trang gọi là index.php
          if($_SESSION["permision"]=='2' ||$_SESSION["permision"] =='1'){
            header('Location: index.php');
          }
          else{
            header('Location: index_user.php');
          }
          
        }
        else {
          echo "mật khẩu không đúng !"  ;
          echo " password_verify($password, $hash) ";
          
        }
	    	}
			
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
			
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- CSS BOOTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS  -->
    <link href="./style.css">
</head>
<body id="body_login" style="background-image: url(./img/401_9.jpg);">
 <form method="POST" action="dang-nhap.php" class="container">
    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="User Name" required autofocus>
                <label for="username">User Name</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
              </div>

              <div class="mb-3 align-self-end">
                <a href="./dang-ky.php"> Đăng ký</a>
              </div>
             
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="btn_submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</body>
</html>
	