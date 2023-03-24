<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php?action=home">DoCaoCuong</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
      <ul class="navbar-nav ms-5">
        <li class="nav-item">
          <a class="nav-link"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=dangky">Đăng ký</a>
        </li>
        <?php
        if (!isset($_SESSION['makh'])) {
          echo '<li class="nav-item"><a href="index.php?action=dangnhap" class="nav-link">Đăng nhập</a></li>';
        }
        ?>
        <?php
        if (isset($_SESSION['makh'])) {
          echo '<li class="nav-item">
          <a href="index.php?action=dangnhap&act=logout" class="nav-link">Đăng Xuất</a>
          </li>';
        }
        ?>

        <li class="nav-item">
          <a href="index.php?action=giohang" class="nav-link"><i style="font-size:30px;" class="fa-solid fa-cart-shopping"></i></a>
        </li>
        <?php
        if (isset($_SESSION['makh']) && isset($_SESSION['tenkh'])) :

          $name = $_SESSION['tenkh'];

        ?>
          <p style="color: red;" class="mt-2"><?php echo "Xin chào " . $name; ?></p>
        <?php
        else :
          echo '<p style="color: red;" class="mt-2";>' . "Xin Chào!" . '</p>';
        ?>
        <?php
        endif;
        ?>
      </ul>
      <form class="d-flex px-3" action="index.php?action=timkiem" method="post">
        <input name="keyword" class="form-control me-2" type="text" placeholder="Search" />
        <input type="submit" value="Search" class="btn btn-primary">
      </form>
    </div>
  </div>
</nav>