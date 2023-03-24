<h1>Kết quả:</h1>
<div class="row g-4 mb-5 mx-auto">
    <?php
    // $keyword = $_POST['keyword'];
    $hh = new hanghoa();
    $result = $hh->getListHangHoaTimKiem($_POST['keyword']); // Chứa sản phẩm Iphone
    while ($set = $result->fetch()) : // $set[mahh=>24, tenhh=>Iphone..., dongia=500000...]
    ?>
        <div class="col-4 product-item mx-auto">
            <div class="product-img">
                <img src="./Content/img/<?php echo $set["hinhanh"]; ?>" class="img-fluid d-block mx-auto">
                <div class="row btns w-100 mx-auto text-center">
                    <button type="button" class="col-6 py-2">
                        <a class="product-name" style="color:white;text-decoration:none;" href="index.php?action=sanpham&act=detail&id=<?php echo $set["mahh"]; ?>">
                            <i class="fa fa-cart-plus"></i> Add to Cart
                        </a>
                    </button>
                    <button type="button" class="col-6 py-2">
                        <a class="product-name" style="color:white;text-decoration:none;" href="index.php?action=sanpham&act=detail&id=<?php echo $set["mahh"]; ?>">
                            <i class="fa fa-binoculars"></i> View
                        </a>
                    </button>
                </div>
            </div>
            <div class="product-info p-3">
                <span class="product-type"><?php echo $set["loai"]; ?></span>
                <a href="index.php?action=sanpham&act=detail&id=<?php echo $set["mahh"]; ?>" class="d-block text-dark text-decoration-none py-2 product-name">
                    <?php echo $set["tenhh"] ?>
                </a>
                <span class="product-price1">
                    <?php
                    if ($set['giagiam'] == 0) {
                        echo number_format($set["dongia"]);
                    } else {
                        echo '<span class="product-price">' . number_format($set["dongia"]) . '</span>';
                    }
                    ?>
                </span>
                <span class="product-sale">
                    <?php
                    if ($set['giagiam'] > 0) {
                        echo number_format($set["giagiam"]);
                    }
                    ?>
                </span>
                <div class="rating">
                    <span>
                        <i class="fa fa-star"></i>
                    </span>
                    <span>
                        <i class="fa fa-star"></i>
                    </span>
                    <span>
                        <i class="fa fa-star"></i>
                    </span>
                    <span>
                        <i class="fa fa-star"></i>
                    </span>
                    <span>
                        <i class="fa fa-star"></i>
                    </span>
                    <span>(<?php echo $set["soluotxem"] ?> views)</span>
                </div>
                <span class="heart-icon">
                    <i class="far fa-heart"></i>
                </span>
            </div>
        </div>
    <?php
    endwhile;
    ?>
</div>