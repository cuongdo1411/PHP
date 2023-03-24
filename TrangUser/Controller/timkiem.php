<?php
    $act = 'timkiem';
    if(isset($_GET['act']))
    {
        $act = $_GET['act'];
    }
    switch($act){
        case 'timkiem':
            include "./View/timkiem.php";
            break;
        }
?>