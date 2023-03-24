<div class="table-responsive">

    <form action="" method="post">
    <?php
      $hd = new hoadon();
      $result = $hd->getOrder($_SESSION['masohd']); //trả về bảng chứa tất cả
      $masohd=$result["masohd"];
      $tenkh=$result["tenkh"];
      $diachi=$result["diachi"];
      $sodt=$result["sodienthoai"];
      $ngaydat=$result["ngaydat"];
      $d = new DateTime($ngaydat);
    ?>
      <table class="table table-bordered" border="0">                          
       <tr>
          <td colspan="4">
            <h2 style="color: red;">HÓA ĐƠN </h2>
          </td>
        </tr>
      <tr>
          <td colspan="2">Số Hóa đơn:<?php echo $masohd;?> </td>
          <td colspan="2"> Ngày lập:<?php echo $d->format('d/m/Y');?></td>
        </tr>
       <tr>
          <td colspan="2">Họ và tên:</td>
          <td colspan="2"><?php echo $tenkh;?></td>
        </tr>
       <tr>
          <td colspan="2">Địa chỉ:  </td>
          <td colspan="2"><?php echo $diachi;?></td>
        </tr>
        <tr>
          <td colspan="2">Số điện thoại: </td>
          <td colspan="2"></td>
        </tr>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $j = 0;
            $result1 = $hd ->getOrderDetail($_SESSION['masohd']);
            while($set=$result->fetch()):
              $j++;
          ?>
            <tr>
              <td><?php echo $j;?></td>
              <td><?php echo $set['tenhh'];?></td>
              <td>Màu:<?php echo $set['mausac'];?>  Size:<?php echo $set['size'];?> </td>
              <td>Đơn Giá:<?php echo $set['dongia'];?>  - Số Lượng:<?php echo $set['soluongmua']; ?> <br />
              </td>
            </tr>
          <?php
            endwhile;
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b> 
                <?php
                  $gh = new giohang();
                  echo $gh->getTotal();
                ?>
              <sup><u>đ</u></sup>
              </b>
            </td>
           
          </tr>
        </tbody>
      </table>
    </form>
</div>
</div>