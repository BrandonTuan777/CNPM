<?php
	session_start(); 
 ?>
<?php require_once("connection.php");?>
<?php include("permission.php");?>

<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$name = $_POST["username"];
        $email = $_POST["email"];
        $phone =$_POST["phone"];
        $num_people=$_POST["num_people"];
        $type_room=$_POST["type_room"];
        $service=$_POST["service"];

		

		$id = $_POST["id"];
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE room SET username = '$name', email = '$email',num_people ='$num_people', type_room = '$type_room',service='$service' WHERE id=$id";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		header('Location: quan-ly-room.php');
	}

	$id = -1;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$sql = "SELECT * FROM room WHERE id = ".$id;
	$query = mysqli_query($conn,$sql);

	function make_permission_dropdown($id){
		$select_1 = "";
		$select_2 = "";
		$select_3 = "";
		if ($id == 0) {
			$select_1 = 'selected = "selected"';
		}
		if ($id == 1) {
			$select_2 = 'selected = "selected"';
		}
		if ($id == 2) {
			$select_3 = 'selected = "selected"';
		}
		$select = '<select id="permission" name="permission">
						<option value="-1"></option>
						<option value="0" '.$select_1.'>Sinh viên</option>
						<option value="1" '.$select_2.'>Giang Viên</option>
						<option value="2" '.$select_3.'>Admin</option>
					</select>';

		return $select;
	}


?>
	<?php
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['id'];
			
	?>
	<form action="chinh-sua-room.php" method="post">
		<table>
			<tr>
				<td colspan="2">
					<h3>Chỉnh sửa thông tin thành viên</h3>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Họ tên :</td>
				<td><input name="username" id="username" value="<?php echo $data['username']; ?>" ></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Địa chỉ email :</td>
				<td><input type="text" id="email" name="email" value="<?php echo $data['email']; ?>"></td>
            </tr>
            <tr>
				<td nowrap="nowrap">Điện thoại:</td>
				<td><input type="number" id="phone" name="phone" value="<?php echo $data['phone']; ?>"></td>
			</tr>
            <tr>
				<td nowrap="nowrap">Số Người:(tối đa 5)</td>
				<td><input type="number" id="num_people" name="num_people" value="<?php echo $data['num_people']; ?>"></td>
			</tr>

            <tr>
            <td>
            <label for="type_room">Loại phòng:</label>
            <td><select id="type_room" name="type_room">
            <option value="STD">STD(phòng tiêu chuẩn)</option>
            <option value="SUP">SUP(phòng chất lượng cao)</option>
            <option value="DLX">DLX(phòng view đẹp)</option>
            <option value="SUT">Phòng cao cấp nhất</option></td>
            
            </select>
            </td>
            
            </tr>

            <tr>
            <td>
            <label for="service">Loại dịch vụ:</label>
            <td><select id="service" name="service">
            <option value="SPA">SPA</option>
            <option value="GYM">GYM</option>
            <option value="FOOD">FOOD</option>
            
            
            </select>
            </td>
            
            </tr>
            
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật thông tin"></td>
			</tr>

		</table>
	
	</form>
	<?php } ?>
