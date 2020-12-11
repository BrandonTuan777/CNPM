<?php
$server_username = "root"; // thông tin đăng nhập host
$server_password = ""; // mật khẩu, trong trường hợp này là trống
$server_host = "localhost"; // host là localhost
$database = 'website'; // database là website
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Tạo kết nối đến database dùng mysqli_connect()
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
// Thiết lập kết nối ủa chúng ta khi truy vấn là dạng UTF8 trong trường hợp dữ liệu là tiếng việt có dâu
mysqli_query($conn,"SET NAMES 'UTF8'");

    define('erver_host', "localhost");
    define('server_username', "root");
    define('erver_password', "");
    define('database', "website");
    
    function connection()
    {
        $conn = mysqli_connect(erver_host,server_username , erver_password,database);
        mysqli_query($conn,"SET NAMES 'UTF8'");
        // $conn = mysqli_connect($server_host,$server_username,$server_password,$database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function addClassRoom($ID, $ClassName, $Subjects, $ClassMate, $Images,$email)
    {
        $conn = connection();
        $sql = 'INSERT INTO classes(ID,ClassName,Subjects,ClassMate,Images,email) values(?,?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssss',$ID, $ClassName, $Subjects , $ClassMate, $Images, $email);
        if(!$stmt->execute())
        {
            return array('result' => 0, 'error' => 'fail_exucted: '. $stmt->error);
        }
        return array('result' => 1, 'error' => 'Location: creatClass.php?status=createClass');
    }

    function getAllClass(){
        $conn = connection();
        $sql = 'SELECT * FROM classes';
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute())
        {
            return array('result' => 0,'error'=>'Fail_getAllClass');
        }

        $totalClass= $stmt->get_result();
        return $totalClass;
    }


    function getClassFromEmail($email){
        $conn = connection();
        $sql = 'SELECT * FROM classes WHERE email=?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$email);
        if(!$stmt->execute())
        {
            return array('result' => 0,'error'=>'Fail_getAllClass');
        }
        else{
            $totalClass= $stmt->get_result();
            return $totalClass;
        }

        
    }

    function getClassStudent($username) {
        $conn = connection();
        $sql = 'SELECT * FROM classes WHERE ID  in ( SELECT id_room FROM danhsach WHERE username =?) ';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$username);
        if(!$stmt->execute())
        {
            return array('result' => 0,'error'=>'Fail_getAllClass');
        }
        else{
            $totalClass= $stmt->get_result();
            return $totalClass;
        }


    }
    function getStudent($ID) {
        $conn = connection();
        $sql = 'SELECT * FROM danhsach WHERE id_room=?   ';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$ID);
        if(!$stmt->execute())
        {
            return array('result' => 0,'error'=>'Fail');
        }
        else{
            $totalClass= $stmt->get_result();
            return $totalClass;
        }
    }

    function deleteClass($ID){
        $conn = connection();
        $sql = 'DELETE FROM classes WHERE ID=?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$ID);
        if(!$stmt->execute())
        {
            return array('result' => 0, 'error' => 'fail_exucted: '. $stmt->error);
        }
        return array('result' => 1, 'error' => 'Location: index.php');
    }

    function getOneClass($ID){
        $conn = connection();
        $sql = 'SELECT * FROM classes WHERE ID=?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$ID);
        if(!$stmt->execute())
        {
            return array('result' => 0, 'error' => 'fail_exucted: '. $stmt->error);
        }
        $oneClass= $stmt->get_result();
        return $oneClass;
    }

    function updateClass( $ClassName, $Subjects, $ClassMate, $Images, $ID){
        $conn = connection();
        $sql = 'UPDATE classes SET ClassName=?, Subjects=?, ClassMate=?, Images=? WHERE ID=?';
        // $sql = 'INSERT INTO classes(ID,ClassName,Subjects,ClassMate,Images) values(?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $ClassName, $Subjects , $ClassMate, $Images, $ID);
        if(!$stmt->execute())
        {
            return array('result' => 0, 'error' => 'execute failed: '. $stmt->error);
        }
        return array('result' => 1, 'error' => 'Location: index.php');
        
    }
    // function checkAdmin($ID){
    //     $conn = connection();
    //     $sql='SELECT * FROM users WHEN id=? AND permision=='2' ';
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param('s', $ID);
    //     f(!$stmt->execute())
    //     {
    //         return array('result' => 0, 'error' => 'execute failed: '. $stmt->error);
    //     }
    //     return array('result' => 1, 'error' => 'Location: index.php');
    // }

function get_total() {
    $conn = connection();
    $result = mysqli_query($conn, "SELECT * FROM `parents` ORDER BY `date` DESC");
    $row_cnt = mysqli_num_rows($result);
    echo '<h1>All Comments ('.$row_cnt.')</h1>';
}



function get_comments()
{
    $temp = $_GET['ID'];

    $conn = connection();


    $result = mysqli_query($conn, "SELECT * FROM parents WHERE id_room = '$temp'   ORDER BY date DESC");

    if ($result) {
        $row_cnt = mysqli_num_rows($result);

        foreach ($result as $item) {
            $date = new dateTime($item['date']);
            $date = date_format($date, 'M j, Y | H:i:s');
            $user = $item['user'];
            $comment = $item['text'];
            $par_code = $item['code'];


            echo '<br/>
                <div class="panel panel-white post panel-shadow">'
                . '  <div class="comment" id="' . $par_code . '">'
                . '     <div class="post-heading">'
                . '          <div class="pull-left meta">'
                . '               <div class="title h5">'
                . '                   <a href="#"><b>' . $user . '</b></a> made a post'
                . '               </div>'
                . '               <h6 class="text-muted time">' . $date . '</h6>'
                . '         </div>'
                . '      </div>'
                . '      <div class="post-description">
                        <p>' . $comment . '</p>'
                . '      </div>'

                . '      <a class="link-reply" id="reply" name="' . $par_code . '">Reply</a>';

            $chi_result = mysqli_query($conn, "SELECT * FROM children WHERE par_code='$par_code' ORDER BY date DESC");
            $chi_cnt = mysqli_num_rows($chi_result);

            if ($chi_cnt == 0) {
                echo '</div></div>
               ';
            } else {
                echo
                    '      <a class="link-reply btn btn-primary" id="children" name="' . $par_code . '"><span id="tog_text">See comments</span> (' . $chi_cnt . ')</a>'
                    . '      <div class="child-comments" id="C-' . $par_code . '">';

                foreach ($chi_result as $com) {
                    $chi_date = new dateTime($com['date']);
                    $chi_date = date_format($chi_date, 'M j, Y | H:i:s');
                    $chi_user = $com['user'];
                    $chi_com = $com['text'];
                    $chi_par = $com['par_code'];


                    echo ' <div class="post-footer">
                        
                      '
                        . '<div class="child" id="' . $par_code . '-C">'
                        . '       <ul  class="comments-list">
                                    <li class="comment">

                                        <div class="comment-body">
                                            <div class="comment-heading">'
                        . '                           <h4 class="user">' . $chi_user . '</h4>'
                        . '                           <h5 class="time">' . $chi_date . '</h5>'
                        . '                        </div>'
                        . '                           <p>' . $chi_com . '</p> 
                                              </div> 
                                    </li>
                             </ul>'
                        . '</div>
                      </div>
                      
                      
                      ';
                }
                echo '</div></div></div> ';
            }

        }
    }
}

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characterLength = strlen($characters);
    $randomString = '';

    for($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $characterLength - 1)];
    }
    return $randomString;
}