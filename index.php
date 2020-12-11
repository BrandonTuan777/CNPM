<?php
session_start();
require_once('connection.php');
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: dang-nhap.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>

    <!-- FONT Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- FONT GOOGLE -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet" />

    <!-- CSS BS4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header class="px-5">
        <nav class="navbar navbar-expand-lg">

            <div class="col-9 col-md-9 col-lg-9 col-xl-10">
                <div class="header__left">
                    <a class="navbar-brand" href="#">
                        <img src="./img/logo_tdtu.png" alt="Logo">
                        <p>HOTEL</p>
                    </a>

                    <form class="header__form">
                        <div class="input-group">
                            
                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3 col-md-3 col-lg-3 col-xl-2">
                <div class="header__right">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown ">
                            <a class="nav-link pr-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-plus"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
                                <a id="creatClass" class="dropdown-item" href="quan-ly-room.php">Quản lí đặt phòng</a>
                                <a id="creatClass" class="dropdown-item" href="./quan-ly-thanh-vien.php">Quản Lí Thành Viên</a>
                            </div>
                        </li>
                        <li class="nav-item else">
                            <a class="nav-link pr-5" href="#">
                                <i class="fa fa-th"></i>

                            </a>
                        </li>

                        <li class="nav-item user">
                            <a class="nav-link" href="#">
                                <img src="./img/user.jpg" alt="User">
                                <div><?php echo $_SESSION['username'] ?></div>
                            </a>
                        </li>

                        <li class="nav-item logout">
                            <a class="nav-link" href="./logout.php">
                                LOG OUT
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </nav>

    </header>
    <div class="js-pride-month-gradient" style="width: 100%; height: 0.8rem; background: linear-gradient(90deg, rgb(100, 91, 83) 0%, rgb(235, 82, 82) 18.23%, rgb(247, 143, 47) 34.37%, rgb(244, 193, 81) 48.96%, rgb(82, 187, 118) 66.15%, rgb(38, 165, 215) 82.29%, rgb(224, 105, 183) 100%);">
    </div>
        <form action="joinClass.php" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Fill Passcode Subject</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="code" placeholder="Passcode">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="sources">
        <div class="row" >
            
           

            
           <img  src="./img/quanli.jpg " alt="Quan lí" width="1370"     height="500" >
            
           

        </div>

        <div style="font-size:40px;color:white;background-color:green;text-align:center">REVIEW KHÁCH SẠN:<a href="./them-bai-viet.php" style="font-size:15px;color:red">(Bạn có muốn cho review?)</a></div>
        <!-- hiện bài viết -->
        <?php
	// Lấy 16 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
	$sql = "select * from posts where is_public = 1 order by createdate desc limit 16";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
?>
			<div class="innertube">
				<table width="100%" border="1">
					<tr>
					<?php
						// Khởi tạo biến đếm $i = 0
						$i = 0;
						// Lặp dữ liệu lấy data từ cơ sở dữ liệu
						while ( $data = mysqli_fetch_array($query) ) {
							// Nếu biến đếm $i = 1, tức là vòng lặp chạy tới bài viết thứ tư thì ta thực hiện xuống hàng cho bài viết kế tiếp
							// Vì mỗi dòng hiển thị, ta chỉ hiển thị 1 bài viết
							if ($i == 1) {
								echo "</tr>";
								$i = 0;
							}
					?>
						<td >
							<b><?php echo $data["title"];// In ra title bài viết ?></b>
							<p><?php echo substr($data["content"], 0, 100)." ...";// In ra nội dung bài viết lấy chỉ 100 ký tự ?></p>
							<a href="display.php?id=<?php echo $data["id"]; // Tạo liên kết đến trang display.php và truyền vào id bài viết ?>"> Xem thêm</a>
						</td>
					
					<?php
							$i++;
						}
					?>
				</table>	
			</div>
		</main>
		
		


    </div>












    <!-- JS BS4 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="main.js"></script>
</body>

</html>