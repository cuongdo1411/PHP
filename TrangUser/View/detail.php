<div class="container">
    <form action="index.php?action=giohang" method="post">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center my-5">CHI TIẾT SẢN PHẨM</h1>
            </div>

            <?php
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $hh = new hanghoa();
                $result = $hh->getHangHoaId($id);
                $tenhh = $result["tenhh"];
                $hinhanh = $result["hinhanh"];
                $mota = $result["mota"];
                $dongia = $result["dongia"];
                $giagiam = $result["giagiam"];
                $soluongton = $result["soluongton"];
                $mausac = $result["mausac"];
            }
            ?>
            <div class="col-6">
                <img src="./Content/img/<?php echo $hinhanh; ?>" width="100%">
            </div>

            <div class="col-6">
                <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                <h5>Nội dung:</h5>
                <h3><?php echo $tenhh; ?></h3><br>
                <b>Mô tả:</b>
                <h6><?php echo $mota; ?></h6><br>
                <b>Giá bán:</b>
                <h4 style="color:red;">
                    <?php
                    if ($giagiam == 0) {
                        echo number_format($dongia);
                    } else {
                        echo number_format($giagiam);
                    }
                    ?> VNĐ </h4><br>
                <b>Màu sắc:</b>
                <select name="mymausac" class="form-control" style="width:150px;">
                    <?php
                    $kq = $hh->getHangHoaNhom($result['nhom']);
                    while ($set = $kq->fetch()) :
                    ?>
                        <option value="<?php echo $set["mausac"]; ?>"><?php echo $set["mausac"]; ?></option>
                        <?php
                    endwhile;
                        ?>.
                </select><br>
                <h6>Số lượng: <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" /></h6>
                <b>Còn lại:</b> <?php echo number_format($soluongton); ?><br>
                <button class="btn btn-warning" type="submit">Mua ngay</button>
                <button class="btn btn-danger">Yêu thích</button>
            </div>
        </div>
    </form>
    <div class="col-6">
        <?php
        if (isset($_GET['id'])) {
            $mahh = $_GET['id'];
            $user = new user();
            $sumComment = $user->countCommentHH($mahh);
        }
        ?>
        <h2 class="mt-5 text-center">Đánh giá sản phẩm: (<?php echo $sumComment; ?>)</h2>
        <form action="index.php?action=sanpham&act=comment&id=<?php echo $_GET['id']; ?>" method="post">
            <div class="form-group">
                <label for="danhGia">Đánh giá:</label>
                <div class="rate1">
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1"><i class="fa fa-star"></i></label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2"><i class="fa fa-star"></i></label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3"><i class="fa fa-star"></i></label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4"><i class="fa fa-star"></i></label>
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5"><i class="fa fa-star"></i></label>
                </div>
            </div>
            <div class="form-group">
                <label for="binhLuan">Bình luận:</label>
                <textarea class="form-control" id="binhLuan" rows="3" name="noidung_bl"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Đánh giá</button>
        </form>
        <div class="row">
            <div class="col-12">
                <h2 class="mt-5 text-center">Nhận xét của khách hàng</h2>
            </div>
            <?php
            $result = $user->showComment($mahh);
            while ($set = $result->fetch()) :
            ?>
                <div class="col-12">
                    <h5>Tên:<?php echo $set['username']; ?></h5>
                    <h6>Thời gian bình luận: <?php echo $set['ngaybl']; ?> </h6>
                    <textarea class="form-control" id="binhLuan" rows="1" name="noidung_bl" disabled><?php echo $set['noidung']; ?></textarea>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>