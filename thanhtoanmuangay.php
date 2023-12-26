<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css"> <!-- Đường dẫn tới file CSS -->
    <title>Dropdown Example</title>
    <!-- icon -->
    
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
   
   .row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
  
    </style>

</head>
<body>
<?php include('header.php'); ?>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="processing.php" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Địa chỉ giao hàng</h3>
            <label for="fname"><i class="fa fa-user"></i>Tên đặt hàng</label>
            <input type="text" id="fname" name="name" placeholder="Tên đặt hàng">
            <label for="phone"><i class="fa fa-envelope"></i> Số điện thoại</label>
            <input type="text" id="phone" name="sdt" placeholder="Số điện thoại">
            <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
            <input type="text" id="adr" name="address" placeholder="Địa chỉ">
            <label for="city"><i class="fa fa-institution"></i> Tỉnh/Thành Phố</label>
            <input type="text" id="city" name="city" placeholder="Tỉnh/Thành Phố">
          </div>
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Địa chỉ giao hàng giống như địa chỉ thanh toán
        </label>
        <a href="#" onclick="location.href='./Giohang.php'">
          <span class="material-symbols-outlined"> Quay về giỏ hàng </span
          >
        </a>
        <input type="hidden" name="action" value="Mua giỏ hàng">
        <input type="submit" value="Mua giỏ hàng" class="btn" name="action">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">

      <?php
        if (isset($_GET["id_product"])) {
            $id_product = ($_GET["id_product"]);
            } else {
            echo "NO have ID .";
        }
        if (isset($_GET["number"])) {
            $number = ($_GET["number"]);
            } else {
            echo "NO have ID .";
        }
        $columnCount = 0;
        // Kết nối đến cơ sở dữ liệu để tạo gỏ hàng 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        $sql = "SELECT gia,image,name FROM ttsp where id='$id_product'";
        $result = $conn->query($sql);
        ?>
        <h4>sản phẩm

      </h4>
        <?php 
        if ($result->num_rows > 0) 
        {
            $tongtien =0;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row for each product
                
                $number_products = $number;
                    ?>
                    <td>
                        <img width='100' src='img/<?php echo $row["image"]; ?>' alt='Mô tả hình ảnh'>
                    </td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $row["gia"]; ?></td>
                    <?php $tongtien += intval($row["gia"])*intval($number); ?>
                    
                    <td>
                        <form action="Processing.php" method="POST">
                            <input type="submit" name="action" value="Xem">
                            <input type="submit" name="action" value="DELETE_product_cart">
                            <input type="hidden" name="id" value="<?php echo $id_product; ?>">
                        </form>
                    </td>
                    <?php
                }
        
                echo "</tr>"; // End the current row
        }
            

        $conn->close();
    ?>
    
      <hr>
      <p>Tổng tiền<span class="price" style="color:black"><b><?php echo $tongtien; ?></b></span></p>
    </div>
  </div>
</div>
</body>
</html>
    