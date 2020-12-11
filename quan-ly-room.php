<?php
	session_start(); 
 ?>
<?php require_once("connection.php");?>
<?php include("permission.php");?>

<?php
	$sql = "SELECT * FROM orderbill";
	$query = mysqli_query($conn,$sql);
?>

<!-- Xóa người dùng -->
<?php
	if (isset($_GET["id_delete"])) {
		$sql = "DELETE FROM orderbill WHERE id = ".$_GET["id_delete"];
        mysqli_query($conn,$sql);
        header('Location: quan-ly-room.php');
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link  rel="stylesheet"  href="./style.css">
    <title>Document</title>
</head>
<body class="body_control">
    <table class="member_table" >
	<thead>
		<tr >
			<td>ID room</td>
			<td>Username</td>
			<td>Email</td>
			<td>Phone</td>
			<td>Số người ở</td>
			<td>Loại phòng</td>
			<td>Dịch vụ</td>
			<td>Ngày đặt phòng</td>
            <td>Hành động</td>
			
		<tr>
	</thead>
	<tbody>
	<?php 
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['id'];
	?>
		<tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo $data['phone']; ?></td>
			<td><?php echo $data['num_people']; ?></td>
            <td><?php echo $data['type_room']; ?></td>
			<td><?php echo $data['service']; ?></td>
			<td><?php echo $data['createdate']; ?></td>
			
            <td>
				
            <a href="chinh-sua-room.php?id=<?php echo $id;?> " >Sửa</a>
			<a href="quan-ly-room.php?id_delete=<?php echo $id;?>">Xóa</a>
			</td>
			
		</tr>
	<?php 
			$i++;
		}
	?>
	</tbody>
</table>


<a href="./index.php">Quay về trang chủ</a>

</body>
</html>

