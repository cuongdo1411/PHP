<?php
    class giohang{
        // phương thức thêm thông tin vào giỏ hàng
        function add_items($key, $quantity, $mycolor){
            // thiếu hình, tên, đơn giá
            $prod = new hanghoa();
            $pros = $prod->getHangHoaId($key); // trả về thông tin của 1 object
            $hinh = $pros["hinhanh"];
            $tenhh = $pros["tenhh"];
            $cost = $pros["dongia"];
            $giagiam = $pros["giagiam"];
            if($giagiam == 0){
                $total = $quantity*$cost;
            }else{ 
                $total = $quantity*$giagiam;
            }
            // vì đối tượng chứa thuộc tính là hình, tên, màu, size... nên đối tượng là kiểu mảng.
            $item = array(
                'mahh'=>$key,
                'hinhanh'=>$hinh,
                'ten'=> $tenhh,
                'mausac'=>$mycolor,
                'dongia'=>$cost,
                'soluong'=>$quantity,
                'total'=>$total,
                'giagiam'=>$giagiam,
            );
            // đem đối tượng add vào $section
            $_SESSION['cart'][]=$item;
            // a[]=$item;
        }
        // phương thức tính tổng tiền trong giỏ hàng
        function getTotal()
        {
            $subtotal = 0;
            foreach ($_SESSION['cart'] as $item){
                $subtotal += $item['total'];
            }
            return number_format($subtotal,2);
        }
        //phương thức xóa trong giở hàng
        function delete_items($key)//1
        {
            unset($_SESSION['cart'][$key]);//unset($_SESSION['cart][1]);
            // unset(mang)
        }

        // phương thức update số lượng trong section
        function update_items($key, $quantity){
            if($quantity == 0){
                $this->delete_items($key);
            }
            else{
                // phép gán
                $_SESSION['cart'][$key]['soluong'] = $quantity;//10
                $total_new = $_SESSION['cart'][$key]['soluong']* $_SESSION['cart'][$key]['dongia'];
                $_SESSION['cart'][$key]['total']=$total_new;
            }
        }
    }
?>