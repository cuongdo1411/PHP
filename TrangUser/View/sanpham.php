<?php
if (isset($_GET['act'])) {
    if ($_GET['act'] == 'filterAsc') {
        $ac = 1;
    }
    if ($_GET['act'] == 'filterCategory') {
        $ac = 2;
    }
    if ($_GET['act'] == 'filterDesc') {
        $ac = 3;
    }
}
?>
<?php
// b1: tìm tổng số recode( tìm số sản phẩm trong database của bảng hàng hóa)
$hh = new hanghoa();
// Cach 1
// $count = $hh -> getCountHH(); // 19

// Cach 2:
$result = $hh->getHangHoaAll(); // tra ra table gom 19 san pham
$count = $result->rowCount(); // 19
// B2: cho gioi han moi trang la bao nhieu sp dua vao thiet ke trang web
$limit = 8;
// B3: tinh ra so trang va tim start
$p = new page();
// Tong so trang
$page = $p->findPage($count, $limit); //3
// Lay start
$start = $p->findStart($limit); //8
// trang hien tai
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; //1
?>

<div class="row">
    <h1 class="text-center mt-5">TẤT CẢ SẢN PHẨM</h1>
    <p class="fw-light w-75 mx-auto text-center"></p>
    <div class="col-12">
        <ul class="pagination bg-dark p-3">
            <?php
            // Nut lui prev
            if ($current_page > 1 && $page > 1) // 2 > 1, tong trang 3 > 1
            {
                echo '<li><a href="index.php?action=sanpham&page=' . ($current_page - 1) . '">Prev</a></li>';
            }
            for ($i = 1; $i <= $page; $i++) {
            ?>
                <li><a class="p-4" href="index.php?action=sanpham&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            // nut toi next
            if ($current_page < $page && $page > 1) {
                echo '<li><a href="index.php?action=sanpham&page=' . ($current_page + 1) . '">Next</a></li>';
            }
            ?>
        </ul>
    </div>
</div>
<!-- <form action="index.php?action=sanpham&act=filter" method="post">
    <label for="sort">Sắp xếp theo:</label>
    <select name="sort" id="sort">
        <option value="default">Mặc định</option>
        <option value="category">Tên loại</option>
    </select>
    <button type="submit">Lọc</button>
</form> -->
<div class="mb-5 text-center">
    <a href="index.php?action=sanpham&act=filterCategory" class="btn btn-success"> Sắp xếp theo loại</a>
    <a href="index.php?action=sanpham&act=filterAsc" class="btn btn-success"> Sắp xếp theo giá tăng dần</a>
    <a href="index.php?action=sanpham&act=filterDesc" class="btn btn-success"> Sắp xếp theo giá giảm dần</a>
</div>
<?php
if ($ac == 1) :
?>
    <div class="row g-4 mb-5 mx-auto">
        <!-- Code PHP -->
        <?php
        $hh = new hanghoa();
        $result = $hh->getListHangHoaByPriceAsc($start, $limit); //8,8
        // $result = $hh->getHangHoaAll(); //trả về bảng chứa tất cả
        while ($set = $result->fetch()) :
        ?>
            <!-- Sản phẩm khuyến mãi -->
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
                    <span class="product-type"><?php echo $set["tenloai"]; ?></span>
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
<?php
endif;
?>
<?php
if ($ac == 2) :
?>
    <div class="row g-4 mb-5 mx-auto">
        <!-- Code PHP -->
        <?php
        $hh = new hanghoa();
        $result = $hh->getListHangHoaByCategory($start, $limit); //8,8
        // $result = $hh->getHangHoaAll(); //trả về bảng chứa tất cả
        while ($set = $result->fetch()) :
        ?>
            <!-- Sản phẩm khuyến mãi -->
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
                    <span class="product-type"><?php echo $set["tenloai"]; ?></span>
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
<?php
endif;
?>
<?php
if ($ac == 3) :
?>
    <div class="row g-4 mb-5 mx-auto">
        <!-- Code PHP -->
        <?php
        $hh = new hanghoa();
        $result = $hh->getListHangHoaByPriceDesc($start, $limit); //8,8
        // $result = $hh->getHangHoaAll(); //trả về bảng chứa tất cả
        while ($set = $result->fetch()) :
        ?>
            <!-- Sản phẩm khuyến mãi -->
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
                    <span class="product-type"><?php echo $set["tenloai"]; ?></span>
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
<?php
endif;
?>