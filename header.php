<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styleheader.css"> <!-- Đường dẫn tới file CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <title>Dropdown Example</title>
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicsons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-brand">Flower Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active" href="Main.php">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="Product.php" role="button" data-bs-toggle="dropdown">Sản phẩm</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Link</a></li>
                        <li><a class="dropdown-item" href="#">Another link</a></li>
                        <li><a class="dropdown-item" href="#">A third link</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Vechungtoi.php">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Lienhe.php">Liên hệ</a>
                </li>
                <form id="searchForm" action="#" method="get" class="right-col flex ">
                    <input class="form-control me-2" type="text" id="searchInput" name="keyword" placeholder="Tìm kiếm sản phẩm" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                    <i class="fa-solid fa-magnifying-glass fa-2x" style="color: white"></i>
                </form>

                <script>
                    $(document).ready(function() {
                        // Gắn sự kiện submit cho biểu mẫu
                        $('#searchForm').submit(function(event) {
                            // Lấy giá trị từ trường nhập liệu
                            var searchKeyword = $('#searchInput').val();

                            // Cập nhật giá trị của trường nhập liệu
                            $('#searchInput').attr('value', searchKeyword);
                        });
                    });
                </script>
                <div class=headericon>
                    <i class="fa-regular fa-heart fa-2x" style="color: white" ;></i>
                    <a href="Giohang.php" class="cart-link" >
                        <i class="fa-solid fa-cart-shopping fa-2x" style="color: white"></i>
                    </a>
                    <a href="login.php" class="cart-link1">
                        <i class="fa-regular fa-user fa-2x" style="color: white"></i>
                    </a>
                </div>
            </ul>
        </div>
    </nav>
    </div>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <!-- Left and right controls --><a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>