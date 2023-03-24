<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./Content/img/anh2.jpg" class="d-block" style="width:100%; height: 600px;">
        </div>
        <div class="carousel-item">
            <img src="./Content/img/anh1.jpg" class="d-block" style="width:100%; height: 600px;">
        </div>
        <div class="carousel-item">
            <img src="./Content/img/anh3.jpg" class="d-block" style="width:100%; height: 600px;">
        </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Đây là trang Sản phẩm nổi bật -->
<div class="row">
    <h1 class="text-center mt-5">SẢN PHẨM KHUYẾN MÃI</h1>
    <p class="fw-light w-75 mx-auto text-center"></p>
</div>
<div class="row g-4 my-5 mx-auto owl-carousel owl-theme">
    <!-- Code PHP -->
    <?php
    $hh = new hanghoa();
    $result = $hh->getHangHoaNew(); // Chứa 12 sản phẩm;
    while ($set = $result->fetch()) : // $set[mahh=>24, tenhh=>Iphone..., dongia=500000...]
    ?>
        <!-- Sản phẩm khuyến mãi -->
        <div class="col product-item mx-auto">
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
                <span class="product-price"><?php echo number_format($set["dongia"]) ?></span>
                <span class="product-sale"><?php echo number_format($set["giagiam"]) ?></span>
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

<!-- Đây là trang Sản phẩm Iphone -->
<div class="row">
    <h1 class="text-center mt-5">IPHONE</h1>
    <p class="fw-light w-75 mx-auto text-center"></p>
</div>
<div class="row g-4 my-5 mx-auto owl-carousel owl-theme">
    <!-- Code PHP -->
    <?php
    $hh = new hanghoa();
    $result = $hh->getHangHoaIphone(); // Chứa sản phẩm Iphone
    while ($set = $result->fetch()) : // $set[mahh=>24, tenhh=>Iphone..., dongia=500000...]
    ?>
        <!-- Sản phẩm nổi bật -->
        <div class="col product-item mx-auto">
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
                <a href="index.php?action=sanpham&act=detail&id=<?php echo $set["mahh"]; ?>" class="d-block text-dark text-decoration-none py-2 product-name" class="d-block text-dark text-decoration-none py-2 product-name">
                    <?php echo $set["tenhh"] ?>
                </a>
                <span class="product-price"><?php echo number_format($set["dongia"]) ?></span>
                <span class="product-sale"><?php echo number_format($set["giagiam"]) ?></span>
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

<!-- Đây là trang Sản phẩm Ipad -->
<div class="row">
    <h1 class="text-center mt-5">IPAD</h1>
    <p class="fw-light w-75 mx-auto text-center"></p>
</div>
<div class="row g-4 my-5 mx-auto owl-carousel owl-theme">
    <!-- Code PHP -->
    <?php
    $hh = new hanghoa();
    $result = $hh->getHangHoaIpad(); // Chứa sản phẩm Iphone
    while ($set = $result->fetch()) : // $set[mahh=>24, tenhh=>Iphone..., dongia=500000...]
    ?>
        <!-- Sản phẩm nổi bật -->
        <div class="col product-item mx-auto">
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
                <a href="index.php?action=sanpham&act=detail&id=<?php echo $set["mahh"]; ?>" class="d-block text-dark text-decoration-none py-2 product-name" class="d-block text-dark text-decoration-none py-2 product-name">
                    <?php echo $set["tenhh"] ?>
                </a>
                <span class="product-price"><?php echo number_format($set["dongia"]) ?></span>
                <span class="product-sale"><?php echo number_format($set["giagiam"]) ?></span>
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

<!-- Đây là trang Sản phẩm Ipad -->
<div class="row">
    <h1 class="text-center mt-5">WATCH</h1>
    <p class="fw-light w-75 mx-auto text-center"></p>
</div>
<div class="row g-4 my-5 mx-auto owl-carousel owl-theme">
    <!-- Code PHP -->
    <?php
    $hh = new hanghoa();
    $result = $hh->getHangHoaWatch(); // Chứa sản phẩm Watch
    while ($set = $result->fetch()) : // $set[mahh=>24, tenhh=>Iphone..., dongia=500000...]
    ?>
        <!-- Sản phẩm nổi bật -->
        <div class="col product-item mx-auto">
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
                <a href="index.php?action=sanpham&act=detail&id=<?php echo $set["mahh"]; ?>" class="d-block text-dark text-decoration-none py-2 product-name" class="d-block text-dark text-decoration-none py-2 product-name">
                    <?php echo $set["tenhh"] ?>
                </a>
                <span class="product-price"><?php echo number_format($set["dongia"]) ?></span>
                <span class="product-sale"><?php echo number_format($set["giagiam"]) ?></span>
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

<div class="text-center pb-5">
    <a class="btn btn-secondary" href="index.php?action=sanpham">XEM TẤT CẢ SẢN PHẨM</a>
</div>