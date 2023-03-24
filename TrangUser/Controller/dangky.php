<?php
$act = 'dangky';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangky':
        include "./View/registration.php";
        break;
    case 'dangky_action':
        if (isset($_POST['txttenkh'])) {
            $tenkh = $_POST['txttenkh'];
            $diachi = $_POST['txtdiachi'];
            $sodt = $_POST['txtsodt'];
            $username = $_POST['txtusername']; //trước khi insert vào thì phải kiểm tra username trước đó đã tồn tại trong database hay chưa.
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpass'];
            // tiến hành mã hóa pass
            // $chuoidau="GB@#5";
            // $chuoisau="ERBC";
            $crypt = md5($pass);
            //controller yêu cầu model viết phương thức thêm vào database.
            $us = new user();
            $check = $us->InsertUser($tenkh, $username, $crypt, $email, $diachi, $sodt);
            if ($check != 'false') {
                echo '<script>alert("Dang ky thanh cong");</script>';
                include 'View/home.php';
            } else {
                echo '<script>alert("Dang ky khong thanh cong");</script>';
                include 'View/registration.php';
            }
        }
        break;
    }
?>