<?php

require_once('connection.php');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);


if(isset($_POST['save'])){
    $temp=$_POST['id'];

    $filename = $_FILES['myfile']['name'];
    $dest = 'uploads/'.$filename;
    $extension = pathinfo($filename,PATHINFO_EXTENSION);

    $new_com_date = date('Y-m-d H:i:s');
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if(!in_array($extension,['zip','pdf','png','rar'])){
        echo "Your file extension must be Zip, pdf or png";
    }
    elseif ($_FILES['myfile']['size'] > 1000000000){
        echo" file is too large";
    }
    else{
        if(move_uploaded_file($file,$dest)){
            $sql = "INSERT INTO files (filename,size,id_class,date)
            VALUES ('$filename','$size','$temp','$new_com_date')";

            if(mysqli_query($conn,$sql)){
                header("Location: subject.php?ID=$temp");
            }
            else{
                echo "Failed to upload";
            }
        }
    }

}
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['filename'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['filename']));
        readfile('uploads/' . $file['filename']);


        exit;
    }

}

