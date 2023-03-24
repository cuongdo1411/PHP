<?php
    if(isset($_SESSION['makh'])){
        //gọi phương thức từ model
    $hd = new hoadon();
    $sohd=$hd->InsertOrder($_SESSION['makh']);
    //có được mã số hóa đơn, thì tiền hành insert vào chi tiết hóa đơn
    $total = 0;
    foreach($_SESSION['cart'] as $key => $item){
        // viết phương thức insert vào bảng chi tiết hóa đơn
        $hd->insertOrderDetail($sohd,$item['mahh'],$item['soluong'],$item['mausac'],$item['total']);
        $total += $item['total'];
    }
    // viết phương thức update tổng tiền vào lại bảng hoadon1
    $hd->updateOrderTotal($sohd,$total);

    include "./View/order.php";
    }
    else{
        echo '<script> alert("Bạn phải đăng nhập") </script>';
        include "./View/login.php";
    }
    
?>