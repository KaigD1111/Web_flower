<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .form_sp {
            text-align: center;
            /* Căn giữa */
        }

        .sp-image {
            width: 200px;
            /* Độ rộng của hình ảnh */
        }

        .sp-label {
            display: block;
            /* Hiển thị label như một phần tử block */
            margin-top: 5px;
            /* Khoảng cách giữa hình ảnh và label */
        }
        .carousel-inner img{
            height: 500px;
            position: center;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .carousel-inner{
        margin-top: 10px; /* Điều chỉnh giá trị theo nhu cầu của bạn */
        } 
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css"> <!-- Đường dẫn tới file CSS -->
    <title>Dropdown Example</title>
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php  
#include('account.php');
#echo $acc;
// Truy cập giá trị của biến toàn cục $acc
//$accc = $_SESSION['acc'];
//echo $accc;
include('header.php');
?>
    
    <div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
            <a href="Product.php">
               <img src="img/anhbia1.jpg">
               </a>
            </div>
            <div class="carousel-item">
            <a href="Product.php">
                <img src="https://scontent.fsgn4-1.fna.fbcdn.net/v/t39.30808-6/240404939_442011280594121_8792242414703732528_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeH-Pfi6w1cekihMDLNfO7HMBOs4QMgFd8UE6zhAyAV3xX8MRBb11ZDPVS664o7zLcZOwFMGURgKtVOuV5XiMdWI&_nc_ohc=tCYzW4DAOygAX_2MVke&_nc_ht=scontent.fsgn4-1.fna&oh=00_AfCaCEfji4vL9PvjPdBk9OiwFzSJ-gcLb8ctJPhBnb0Hhw&oe=65657569" alt="Chicago">
            </a>
            </div>
            <div class="carousel-item">
            <a href="Product.php">
                <img src="https://scontent.fsgn3-1.fna.fbcdn.net/v/t39.30808-6/240905524_440537487408167_1192289622447615674_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGslSU63IKi3h9ak8UnvodnQ6gSf61xRBVDqBJ_rXFEFQ5ouEHt-3MQpgb_GA0DnJSrYDR03QK_CmgnmI4mm-BX&_nc_ohc=rm1eX4tovCsAX_m7sup&_nc_ht=scontent.fsgn3-1.fna&oh=00_AfBW-FPfgd76yGBIlKL-MlFuGWmLoduEAL8SBKqBj0tsEg&oe=65654906" alt="New York">
            </a>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
            ?>
            <script src="script.js"></script>

            <!-- Bao gồm thư viện jQuery và Bootstrap JavaScript -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <?php
            function isWordInString($word, $string)
            {
                // Chuyển đổi cả từ và chuỗi về chữ thường để kiểm tra không phân biệt chữ hoa/chữ thường
                $word = strtolower($word);
                $string = strtolower($string);

                // Tìm kiếm xem từ có xuất hiện trong chuỗi hay không
                $position = strpos($string, $word);

                // Kiểm tra kết quả của strpos
                if ($position !== false) {
                    // Tìm thấy từ trong chuỗi
                    return true;
                } else {
                    // Không tìm thấy từ trong chuỗi
                    return false;
                }
            }
            ?>
</body>
<?php include('footer.php'); ?>
</html>