<?php
$act = 'sanpham';
//Controller điều phối đến các view khác nhau
if (isset($_GET["act"])) {
    $act = $_GET["act"]; // detail
}
switch ($act) {
    case "sanpham":
        include "./View/sanpham.php";
        break;
    case "detail":
        include "./View/detail.php";
        break;
    case "comment":
        // gửi qua nội dung comment và id mahh
        if (isset($_GET['id'])) {
            $mahh = $_GET['id'];
            $makh = $_SESSION['makh'];
            $noidung = $_POST['noidung_bl'];
            // cần đưa thông tin này vào database
            $user = new user();
            $user->insertComment($mahh, $makh, $noidung);
            echo '<script>alert("Gửi bình luận thành công");</script>';
        }
        break;
    case "filterAsc":
        include "./View/sanpham.php";
        break;
    case "filterCategory":
        include "./View/sanpham.php";
        break;
    case "filterDesc":
        include "./View/sanpham.php";
        break;
}
