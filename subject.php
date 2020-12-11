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
include('upload.php');
?>
<!-- Xóa người dùng -->
<?php
if (isset($_GET["id_delete"])) {

    $sql = "DELETE FROM danhsach WHERE username = '".$_GET["id_delete"]."' and id_room = '".$_GET["ID"]."'";

    mysqli_query($conn,$sql);
    header('Location: subject.php?ID='.$_GET["ID"]);
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
                <a class="navbar-brand" href="index.php">
                    <img src="./img/logo_tdtu.png" alt="Logo">
                    <p>Lớp Học</p>
                </a>


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
                            <a class="dropdown-item" href="#">Tham gia lớp học</a>
                            <a id="creatClass" class="dropdown-item" href="creatClass.php">Tạo lớp học</a>
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
    </nav>

</header>
<div class="js-pride-month-gradient" style="width: 100%; height: 0.8rem; background: linear-gradient(90deg, rgb(100, 91, 83) 0%, rgb(235, 82, 82) 18.23%, rgb(247, 143, 47) 34.37%, rgb(244, 193, 81) 48.96%, rgb(82, 187, 118) 66.15%, rgb(38, 165, 215) 82.29%, rgb(224, 105, 183) 100%);">
</div>

<?php
    $temp = $_GET['ID'];
    $total = getOneClass($temp);
    $student = getStudent($temp);
    $row = $total->fetch_assoc();

?>
<div class="container-fluid gedf-wrapper">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="h5">Tên lớp: <?=$row['ClassName']?></div>
                    <div class="h7 text-muted">Email Giáo viên : <?=$row['email']?></div>
                    <div class="h7">ClassMate : <?=$row['ClassMate']?>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="h6 text-muted">Sinh viên</div>
                        <?php while(($row2 = $student->fetch_assoc())){
                        ?>

                        <div class="h5"><?=$row2['username']?></div>
                        <?php if ($_SESSION['permision'] ==0){}else { ?>
                        <a href="subject.php?ID=<?php echo $temp?>&id_delete=<?php echo $row2['username']?>">Xóa</a>

            <?php } }
                        ?>
                    </li
                </ul>
            </div>
        </div>


        <!--- \\\\\\\Post-->


            <div class="col-md-6 gedf-main">
                <div class="card gedf-card">
                    <?php

                    require_once ('check_com.php');
                    ?>
                    <form action="" method="post" class="main">

                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="5" placeholder="Write something"></textarea>
                                </div>

                            </div>

                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <input type="submit" class="form-submit btn btn-primary" name="new_comment" value="post">
                            </div>

                        </div>
                    </div>
                    </form>
                 </div>
                <?php get_comments(); ?>
            </div>
        <!-- Post /////-->
        <div class="col-md-3">
            <div class="card gedf-card">
                <div class="card-body">
                    <?php if ($_SESSION["permision"] == '0') {}else{ ?>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <legend>File :</legend>
                        <div class="form-group">
                            <input type="file" name="myfile" />
                        </div>
                        <div class="form-group">
                            <form action="upload.php" method="post" class="main">
                                <input type="hidden"  name="id" value="<?=$temp?>">
                                <input type="submit" name="save"  value="Upload" class="btn btn-info"/>
                            </form>
                        </div>
                    <?php } ?>
                    </form>
                </div>
                <table class="table   table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>File Name</th>
                        <th>Size</th>

                        <th>Download</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $id = 1;
                        foreach($files as $file):
                        if($temp == $file['id_class']){
                            $temp1=$file['id'];
                            ?>
                    <tr>
                        <td><?php echo $id; $id+=1?></td>
                        <td class="text-break"><?php echo $file['filename'];?></td>
                        <td><?php echo $file['size']/1000 ."Kb";?></td>

                        <td>
                            <a href="subject.php?ID=<?= $temp?>&file_id=<?php echo $file['id'] ?>">Download</a>
                        </td>

                    </tr>
                    <?php }
                        endforeach;?>
                    </tbody>
                </table>
            </div>




            <!-- JS BS4 -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="main.js"></script>
</body>

</html>