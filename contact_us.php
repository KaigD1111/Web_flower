<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        
        .container {
            width: 60%;
            padding: 45px;
            border-radius: 0;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        
        .row {
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }
        
        .col-md-7 {
            padding: 20px;
        }
        
        .col-md-5 {
            background-color: rgb(197, 110, 78);
            padding: 20x;
            color: white;
        }
        
        .form-control {
            height: 52px;
            background: #fff;
            color: #000;
            font-size: 14px;
            border-radius: 2px;
            box-sizing: nonel important;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .bi {
            font-size: 20px;
        }
        
        .d-flex p {
            font-size: 18px;
            padding-left: 18px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        
        @media only screen and (max-width:600px) {
            .container {
                width: 100%;
                position: absolute;
                left: 50%;
                top: 80%;
            }
        }
        .alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}
      .closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}
.closebtn:hover {
  color: black;
}

.alert {
  opacity: 1;
  transition: opacity 0.6s; /* 600ms to fade out */
}
    </style>
    <?php  
#include('account.php');
#echo $acc;
// Truy cập giá trị của biến toàn cục $acc
//$accc = $_SESSION['acc'];
//echo $accc;
include('header.php');
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css">
    <!-- Bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Đường dẫn tới file CSS -->
    <title>Contact Form</title>
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>
    <?php 
$status = isset($_GET['status']) ? $_GET['status'] : '';
if ($status === 'guitinthanhcong') {
    ?>
            <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        gửi tin nhắn cho admin thành công
      </div>

<?php
} 
?>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <form action="processing.php" method="POST">
                    <h4>Liên hệ</h4>
                    <hr>
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Nội dung</label>
                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    </div>
                    <button type="submit" name="action" value="gửi tin nhắn" class="btn btn-primary">GỬI</button>
                </form>
            </div>
            <div class="col-md-5">
                <h4>Contact Us</h4>
                <hr>
                <div class="mt-5">
                    <div class="d-flex">
                        <i class="bi bi-geo-alt-fill"></i>
                        <p> Địa chỉ: 132 Nguyễn Hoàng, P. An Phú, TP. Thủ Đức (Quận 2 cũ), TP. Hồ Chí Minh</p>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <i class="bi bi-telephone-fill"></i>
                        <p> 090 717 0030 </p>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <i class="bi bi-envelope-fill"></i>
                        <p>mqflowershop@gmail.com </p>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <i class="bi bi-calendar"></i>
                        <p> Mở cửa: Thứ 2 đến Chủ nhật từ 8h đến 19h00 </p>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <i class="bi bi-chat-dots"></i>
                        <button type="button" class="btn" data-bs-toggle="button" style="color: white; font-size: 18px;
                        padding-left: 18px; font-family: Verdana, Geneva, Tahoma, sans-serif;">Chat with admin</button>
                    </div>
                </div>
            </div>
        </div>
    <script>
        // Your existing script
    </script>
</body>
</html>