<form action="index.php?action=giohang&act=update_item" method="post">
<h1 class="my-5 text-center">THÔNG TIN GIỎ HÀNG</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin sản phẩm</th>
            <th scope="col">Màu sắc</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
            <th scope="col">Tùy chỉnh</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $j = 0;
        foreach ($_SESSION['cart'] as $key => $item) :
            $j++;
        ?>
            <tr>
                <td scope="row"><?php echo $j; ?></td>
                <td><?php echo $item['ten']; ?></td>
                <td><?php echo $item['mausac']; ?></td>
                <td>
                    <?php
                        if($item['giagiam'] == 0){
                            echo number_format($item['dongia']);
                        } 
                        else{
                            echo number_format($item['giagiam']);
                        }
                    ?>
                </td>
                <td><input type="text" name="newqty[<?php echo $key; ?>]" value="<?php echo $item['soluong']; ?>" /></td>
                <td><?php echo number_format($item['total']); ?></td>
                <td>
                    <a href="index.php?action=giohang&act=delete_item&id=<?php echo $key;?>">
                        <button type="button" class="btn btn-danger">Xóa</button>
                    </a>
                    <button type="submit" class="btn btn-warning">Sửa</button>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
        <tr>
            <td colspan="5">Tong tien: </td>
            <td>
                <?php
                $gh = new giohang();
                echo $gh->getTotal();
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="6"></td>
            <td><a class="btn btn-success" href="index.php?action=order">Thanh toán</a></td>
        </tr>
    </tbody>
</table>
</form>