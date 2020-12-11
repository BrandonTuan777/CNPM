<?php
    require_once('connection.php');
?>

<?php
    $ID='';
    $className='';
    $Subjects='';
    $ClassMate='';
    $classImage='';
    $error='';

    if( isset($_POST['className']) && isset($_POST['subject']) && isset($_POST['classMate']) && 
    isset($_POST['classImage'])){
        $ClassName=trim( $_POST['className']);
        $Subjects= trim($_POST['subject']);
        $ClassMate=trim( $_POST['classMate']);
        $classImage= $_POST['classImage'];
        $ID=trim( $_GET['ID']);

        // echo $ID."</br>";
        // echo $ClassName."</br>";
        // echo $Subjects."</br>";
        // echo $ClassMate."</br>";
        // echo $classImage."</br>";
        if($ClassName == ""){
            echo "Hello";
            // header("Location: editClass.php");
        }
        else{
            // echo $ID."</br>";
            $addClass=updateClass($ClassName, $Subjects, $ClassMate, $classImage, $ID);
            // echo var_dump($addClass);
            if($addClass['result']==0){
                header("Location: editClass.php");
            }
            else{
                // echo "Update";
                header("Location: index.php");
            }
        }
    }
?>
