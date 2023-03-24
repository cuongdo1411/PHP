<?php 
$act ="home";
if(isset($_GET['action'])){
    $act=$_GET['action'];
}
switch($act){
    case "home":
        include "./View/home.php";
        break;
    case "detail":
        include "./View/detail.php";
        break;
    default:
        include "./View/home.php";     
}
?>