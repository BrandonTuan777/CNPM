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
        <title>KLK</title>
        <link rel="stylesheet" href="./CSS/demo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!-- header -->
        <div class="header">
            <img src="./Img/LOGO.png" alt="logo">
            <!-- ul>li*5>a -->
            <ul>
                <li><a href="#">TRANG CHỦ</a></li>
                <li><a href="./lien_he.html">LIÊN HỆ</a></li>
                
                <li><a href="./dang-ky-room.php">ĐĂNG KÝ PHÒNG</a></li>
                <li class="nav-item logout">
                            <a class="nav-link" href="./logout.php">
                                LOG OUT
                            </a>
                </li>
            </ul>
        </div>

        <!-- carousel -->
        <div class="carousel"></div>

        <!-- intro -->
        <div class="intro">
            <p class="intro__text">
                <span class="intro__text__red">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, libero? </span> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci assumenda perferendis libero omnis tenetur modi voluptates
                hic, ipsam nam voluptatem nobis nemo maiores excepturi voluptate. Aperiam fugit ipsum dignissimos, blanditiis architecto consectetur fuga neque sint eos cum ex quis voluptate perspiciatis reprehenderit facilis amet. Autem laudantium facere
                cum consequatur dolor?
            </p>
            <!-- Bên trái -->
            <div class="intro__left">

                <div class="intro__product intro__item1">
                    <img src="./Img/img_nha_tam.jpg">
                </div>

                <div class="intro__product intro__item1">
                    <img src="./Img/sofa.jpg">
                </div>

                <div class="intro__product intro__item2">
                    <img src="./Img/img_noi_that.jpg">
                </div>

            </div>
            <!-- Bên phải -->
            <div class="intro__right">

                <div class="intro__product intro__item2">
                    <img src="./Img/img_phong_khach.jpg">
                </div>

                <div class="intro__product intro__item2">
                    <img src="./Img/img_van_phong.jpg">
                </div>
            </div>




        </div>
        </div>

        <!-- Emmet -->
        <!-- .products -->
        <!-- #products -->
        <!-- products  -->
        <div class="products">
            <h2>CÁC PHÒNG HOT</h2>
            <!-- BEM -->
            <div class="products__content">

                <!-- item1 -->
                <div class="products__item">
                    <img src="./Img/sp_1.jpg">
                    <h3>SP001</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam qui deserunt molestias magnam veniam voluptas fugiat veritatis? Voluptatibus aliquid obcaecati non possimus soluta, omnis fugit explicabo, labore, quibusdam fugiat
                        eum.
                    </p>
                   
                </div>
                <!-- item2 -->
                <div class="products__item">
                    <img src="./Img/sp_2.jpg">
                    <h3>SP002</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam qui deserunt molestias magnam veniam voluptas fugiat veritatis? Voluptatibus aliquid obcaecati non possimus soluta, omnis fugit explicabo, labore, quibusdam fugiat
                        eum.
                    </p>
                    
                </div>
                <!-- item3 -->
                <div class="products__item">
                    <img src="./Img/sp_3.jpg">
                    <h3>SP003</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam qui deserunt molestias magnam veniam voluptas fugiat veritatis? Voluptatibus aliquid obcaecati non possimus soluta, omnis fugit explicabo, labore, quibusdam fugiat
                        eum.
                    </p>
                    
                </div>
                <!-- item4 -->
                <div class="products__item">
                    <img src="./Img/sp_4.jpg">
                    <h3>SP004</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam qui deserunt molestias magnam veniam voluptas fugiat veritatis? Voluptatibus aliquid obcaecati non possimus soluta, omnis fugit explicabo, labore, quibusdam fugiat
                        eum.
                    </p>
                    
                </div>

            </div>
        </div>
        <!-- clear products -->
        <div class="clear"></div>

        <!-- banner -->
        <div class="banner">
            <div class="banner__circle">

                <p>SALE OFF</p>
                <P>25%</P>
                <P>Các phòng </P>
                <p>trong tháng 7</p>

            </div>

        </div>

        <!-- service -->
        
        <!-- review -->
        <div> <div style="font-size:40px;color:white;background-color:green;text-align:center">REVIEW KHÁCH SẠN:<a href="./them-bai-viet.php" style="font-size:15px;color:red">(Bạn có muốn cho review?)</a></div>
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
			</div></div>
        <!-- footer -->
        <div class="footer">
            <h3>Interio Desgin</h3>
            <p>Địa chỉ: Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
            <p>Điện thoại:0888700904</p>
            <p>Điện thoại di động:0888700954</p>
        </div>
        
        
       
    </body>

    </html>