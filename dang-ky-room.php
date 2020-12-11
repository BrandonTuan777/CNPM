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
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		
		$username = $_SESSION["username"];
		$email = $_SESSION["email"];
		$phone = $_SESSION["phone"];
        $num_people=$_POST["num_people"];
        $type_room=$_POST["type_room"];
        $service=$_POST["service"];


		// hash mật khẩu người dùng và đưa vào data 

		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($num_people == "" || $type_room == "" || $service == "") {
			echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
			
			 $sql = "INSERT INTO room(username, email, phone, num_people,type_room, service , createdate ) VALUES ( '$username', '$email', '$phone','$num_people','$type_room','$service', now())";
			
			
			// thực thi câu $sql với biến conn lấy từ file connection.php
			mysqli_query($conn,$sql);
            
            
			if($_SESSION["permision"]=='2' ||$_SESSION["permision"] =='1'){
                header('Location: index.php');
              }
              else{
                header('Location: index_user.php');
              }
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
	<form action="dang-ky-room.php" method="post">
		
		<div class="form-group">
			<label for="email">Số người(tối đa 5): </label>
			<input type="number" class="form-control"  id="num_people" name="num_people" placeholder="">
		</div>
        <div class="form-group">
        <div>Lựa chọn loại phòng:</div>
					<input type="radio" id="type_room" name="type_room" value="STD">
					<label for="STD">STD(phòng tiêu chuẩn)</label><br>
					<input type="radio" id="type_room" name="type_room" value="SUP">
					<label for="SUP">SUP(phòng chất lượng cao)</label><br>
                    <input type="radio" id="type_room" name="type_room" value="DLX">
					<label for="DLX">DLX(phòng view đẹp)</label><br>
                    <input type="radio" id="type_room" name="type_room" value="SUT">
					<label for="SUT">Phòng cao cấp nhất</label><br>					
		</div>
        <div>Lựa chọn dịch vụ đính kèm:</div>
					<input type="radio" id="service" name="service" value="SPA">
					<label for="SPA">SPA</label><br>
					<input type="radio" id="service" name="service" value="GYM">
					<label for="GYM">GYM</label><br>
                    <input type="radio" id="service" name="service" value="FOOD">
					<label for="FOOD">FOOD</label><br>
                    		
		</div>
		

		<div class="btn_create">
			<input class="btn_create_item" type="submit" name="btn_submit" value="Đăng ký phòng">
		</div>
		
		
		
	</form>
</body>
</html>
	
