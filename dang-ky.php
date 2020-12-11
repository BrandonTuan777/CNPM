<?php require_once("connection.php"); ?>
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		
		$username = $_POST["username"];
		$password = $_POST["pass"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		
		$hashAndSalt = password_hash($password, PASSWORD_BCRYPT);
		// hash mật khẩu người dùng và đưa vào data 

		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $password == "" || $name == "" || $email == "" || $phone == "") {
			echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
			
			 $sql = "INSERT INTO users(username, password, fullname, email, phone, createdate ) VALUES ( '$username','$hashAndSalt', '$name', '$email', '$phone', now())";
			
			
			// thực thi câu $sql với biến conn lấy từ file connection.php
			mysqli_query($conn,$sql);
			
			echo "<h2>Đăng ký thành công</h2>";
			header('Location: dang-nhap.php');
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- CSS BOOTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS  -->
    <link rel="stylesheet" href="./style.css">
</head>
<body class="body_create">
	<form action="dang-ky.php" method="post">
		<div class="form-group ">
			<label for="username">User Name</label>
			<input type="text" id="username" name="username" class="form-control"  placeholder="User Name">
		</div>
		<div class="form-group ">
			<label for="pass">Password</label>
			<input type="password" id="pass" name="pass" class="form-control"  placeholder="Password">
		</div>
		</div>
		<div class="form-group">
			<label for="name">Họ và tên </label>
			<input type="text" class="form-control"  id="name" name="name" placeholder="">
		</div>
		<div class="form-group">
			<label for="email">Email </label>
			<input type="email" class="form-control"  id="email" name="email" placeholder="">
		</div>
		<div class="form-group">
			<label for="email">SĐT: </label>
			<input type="number" class="form-control"  id="phone" name="phone" placeholder="">
		</div>

		

		<div class="btn_create">
			<input class="btn_create_item" type="submit" name="btn_submit" value="Dang ky">
		</div>
		
		
		
	</form>
</body>
</html>
	
