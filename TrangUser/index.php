<?php
session_start();
set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');
spl_autoload_register();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- --- -->

    <!-- FONTAWSOME -->
    <script src="https://kit.fontawesome.com/d3d7d2fea9.js" crossorigin="anonymous"></script>
    
    <!-- --- -->

    <!-- owl_carousel: dùng để hiển thị sản phẩm theo Slide-->
    <link rel="stylesheet" href="./Content/owl_carousel/owl.carousel.css">
    <link rel="stylesheet" href="./Content/owl_carousel/owl.theme.default.css">
    <!-- --- -->

    <!-- CSS -->
    <link rel="stylesheet" href="./Content/css/style.css">
    <!-- --- -->
    <title>Document</title>
</head>

<body>
    <!-- Hiển thị phần header -->
    <?php
    include "View/header.php";
    ?>

    <!-- Hiển thị phần nội dung -->
    <div class="container">
        <?php
        $ctrl = "home";
        if (isset($_GET['action'])) {
            $ctrl = $_GET['action'];
        }
        include "Controller/" . $ctrl . ".php";
        ?>
    </div>

    <!-- Hiển thị phần footer -->
    <?php
    include "View/footer.php";
    ?>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./Content/owl_carousel/owl.carousel.js"></script>
    <script src="./Content/js/script.js"></script>
</body>

</html>