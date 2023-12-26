<?php 
//include('account.php');
session_start();    
$acc = isset($_SESSION['acc']) ? $_SESSION['acc'] : null;
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Thực hiện câu lệnh SQL SELECT để lấy danh mục
$sql = "SELECT DISTINCT category FROM ttsp";
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="1.css"> <!-- Đường dẫn tới file CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
-->
    <title>Dropdown Example</title>
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicsons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="image/logo.png">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>  <!--sài cho click dô danh mục -->
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
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $categoryName = $row['category'];
                                echo "<li><a class='dropdown-item' href='#' onclick='showAlertAndSend(\"$categoryName\")'>$categoryName</a></li>";
                            }
                            $categoryName = 'tất cả';
                            echo "<li><a class='dropdown-item' href='#' onclick='showAlertAndSend(\"$categoryName\")'>$categoryName</a></li>";
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Vechungtoi.php">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Liên hệ</a>
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
        <script>
function showAlertAndSend(categoryName) {
    alert("Bạn đã chọn danh mục: " + categoryName);
    document.cookie = "selectedCategory=" + categoryName;

    // Redirect to Product.php
    window.location.href = "Product.php";
}
    </script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var cartLink = document.getElementById("cartLink");

    // Gắn sự kiện click cho liên kết giỏ hàng
    cartLink.addEventListener("click", function(event) {
        // Lấy giá trị của $acc từ PHP và kiểm tra
        var accValue = <?php echo json_encode($acc); ?>;
        
        // Nếu $acc là null, ngăn chặn chuyển hướng và hiển thị cảnh báo
        if (!accValue) {
            alert("Vui lòng đăng nhập trước khi xem giỏ hàng.");
            event.preventDefault(); // Ngăn chặn chuyển hướng
        }
    });
});
</script>
                <div class=headericon>
                    <i class="fa-regular fa-heart fa-2x" style="color: white" ;></i>
                    <a href="Giohang.php" class="cart-link" id="cartLink">
                        <i class="fa-solid fa-cart-shopping fa-2x" style="color: white"></i>
                    </a>
                        <li class="nav-item dropdown">
                        <a class="fa-regular fa-user fa-2x"role="button" data-bs-toggle="dropdown" style="color: white"></a>
                        <ul class="dropdown-menu"> 
                        <?php if ($acc): ?>
                                <li><a class="dropdown-item-ad" href="login.php"><?php echo"heloo ". $acc ?></a></li>
                                <li><a class="dropdown-item-ad" href="login.PHP">Đăng xuất</a></li>
                                <li><a class="dropdown-item-ad" href="Doimatkhau.php">Đổi mật khẩu</a></li>
                                <li><a class="dropdown-item-ad" href="Thongtintaikhoan.php">Thông tin tài khoản</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item-ad" href="login.php">Đăng nhập</a></li>
                                <li><a class="dropdown-item-ad" href="ĐK.php">Đăng ký</a></li>
                            <?php endif; ?>
                           
                        </ul>
                        </li>
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