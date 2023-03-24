<?php
if (!isset($_SESSION)) {
    $_SESSION["cart"] = array();
    // đem thông tin hình, tên, màu, size, soluong, dongia, tongtien
    // tạo 1 object

}
$act = "giohang";
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$act = "giohang";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'giohang':
        // Đặt điều kiện: phải đăng nhập mới được thêm sản phẩm vào giỏ hàng.
        if (isset($_SESSION['makh'])) {
            // chuyển dữ liệu qua bên controller
            if (isset($_POST["mahh"])) {
                $mahh = $_POST["mahh"];
                $soluong = $_POST["soluong"];
                $mausac = $_POST["mymausac"];
                
                // phải gọi được phương thức add thông tin vào giỏ hàng.
                $gh = new giohang();
                $gh->add_items($mahh, $soluong, $mausac); //2 3 màu be đậm 36
                foreach($_SESSION['cart'] as $key => $item){
                    foreach($_SESSION['cart'] as $key1 => $item1){
                        if($item['mahh']==$item1['mahh'] && $item['mausac']==$item1['mausac'] && $key1 > $key)
                        {
                            $_SESSION['cart'][$key]['soluong'] += $_SESSION['cart'][$key1]['soluong'];
                            $_SESSION['cart'][$key]['total'] += $_SESSION['cart'][$key1]['total'];
                            array_splice($_SESSION['cart'], $key1, 1);
                        }
                    }
                }
            }
            include "./View/cart.php";
            break;
        }
        else {
            echo '<script> alert("Bạn vui lòng đăng nhập.");</script>';
            include "./View/login.php";
        }

    case 'delete_item':
        // chuyển id qua
        if (isset($_GET['id'])) {
            $key = $_GET['id'];
            $gh = new giohang();
            $gh->delete_items($key);
        }
        include "./View/cart.php";
        break;

    case 'update_item':
        //số lượng là thẻ input
        if (isset($_POST['newqty'])) {
            //$_SESSION[]
            $new_list = $_POST['newqty'];
            foreach ($new_list as $key => $qty) {
                if ($_SESSION['cart'][$key]['soluong'] != $qty) {
                    // tiến hành cập nhật
                    // model cập nhật
                    $gh = new giohang();
                    $gh->update_items($key, $qty);
                }
            }
        }
        include "./View/cart.php";
        break;
}
?>