<!DOCTYPE html>
<html lang="en">

<head>   
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
<style>
    .about {
        width: 100%;
        padding: 78px 0px;
        background-color: 191919;
    }
    
    .about img {
        height: auto;
        width: 420px;
    }
    
    .about-text {
        width: 600px;
    }
    
    .main {
        width: 1130px;
        max-width: 95%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    
    .about-text h1 {
        color: white;
        font-size: 80px;
        text-transform: capitalize;
    }
    
    .about-text h5 {
        color: rgb(4, 3, 3);
        font-size: 25px;
        text-transform: capitalize;
        margin-bottom: 20px;
        letter-spacing: 2px;
    }
    
    .about-text p {
        color: rgba(68, 65, 68, 0.8);
        letter-spacing: 1px;
        line-height: 35px;
        font-size: 18px;
        margin-bottom: 20px;
        width: 800px;
    }
    
    span {
        color: #f9004d;
    }
    
    button {
        background: #508D69;
        color: white;
        text-decoration: none;
        border: 2px solid transparent;
        font-weight: bold;
        padding: 13px 14px;
        border-radius: 30px;
        transition: .4s;
    }
    
    button:hover {
        background: transparent;
        border: 2px solid;
        cursor: pointer;
    }
</style>
  
<body>
<?php include('header.php'); ?>

<body>
    <section class="about">
        <div class="main">
            <img src="https://i.pinimg.com/564x/af/32/6d/af326d3daddf71fe517e348f0846353d.jpg" alt="">
            <div class="about-text">
                <h1>About Us</h1>
                <h5>Flower Store
                </h5>
                <p>
                    Tiệm hoa Flower Store nằm giữa lòng Sài Gòn nhộn nhịp với những mảng tường xanh mát, nắng đan xen qua giàn dây leo lá rũ, tạo một cảm giác bình yên, nhẹ nhàng và gần gũi . Mời bạn ghé thăm ngôi nhà rất thơ này để cùng ngắm nhìn nhiều loại hoa tươi trong
                    nước đến các loại hoa cao cấp nhập khẩu từ Ecuador, Hà Lan, Nam Phi, Nhật Bản…
                </p>
                <br>
                <p>
                    Đội ngũ Florist chúng tôi - các bạn trẻ đầy sáng tạo, đam mê và nhiệt huyết với mong muốn tạo được sự gắn kết cảm xúc và lan toả yêu thương qua những bông hoa tươi thắm. Mỗi một sản phẩm hoa hoàn thiện được trao đến tay khách hàng là tất cả sự tận tâm
                    và trân trọng của chúng tôi .
                </p>
                
            </div>
        </div>
    </section>
</body>
<?php include('footer.php'); ?>
</html>