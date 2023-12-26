
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
.alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
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
<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
if ($status === 'sai') {
    ?>
      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Đăng nhập thất bại : sai tên tài khoản hoặc mật khẩu.
      </div>
       
<?php
} 
if ($status === 'bankhongcosp') {
  ?>
        <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        bạn không có sản phẩm để thanh toán
      </div>
      <?php }
if ($status === 'xoaspkhoigiohangthanhcong') {
  ?>
        <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        đã 1 bỏ sản phẩm khỏi giỏ hàng 
      </div>
      <?php } ?>
<div class="row">
  <div class="col-75">
    <div class="container">
    <form id="checkoutForm" action="processing.php" method="post">
      
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
        <input type="submit" value="Mua giỏ hàng" class="btn" name="action" id="buyButton">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">

      <?php
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
        $sql = "SELECT id_product, number_products FROM cart where id_acc='$acc'";
        $result = $conn->query($sql);
        $num_items = $result->num_rows;
        ?>
        <h4>Giỏ hàng
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b><?php echo $num_items ?></b>
        </span>
      </h4>
        <?php 
         $tongtien =0;
        if ($result->num_rows > 0) {
            $tongtien =0;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row for each product
        
                $id_product = $row['id_product'];
                $number_products = $row['number_products'];
                $productQuery = "SELECT id, name,image,gia FROM ttsp WHERE id = '$id_product'";
                $productResult = $conn->query($productQuery);
        
                if ($productResult->num_rows > 0) {
                    $productData = $productResult->fetch_assoc();
                    ?>
                    <td>
                        
                        <img width='100' src='img/<?php echo $productData["image"]; ?>' alt='Mô tả hình ảnh'>
                    </td>
                    <td><?php echo $productData["name"]; ?></td>
                    <td><?php echo  $number_products."X"; ?></td>
                    <td><?php echo $productData['gia']; ?></td>
                    <?php $tongtien += intval($productData['gia'])*intval($number_products); ?>
                    
                    <td>
                        <form action="Processing.php" method="POST">
                            <button type="submit" name="action" value="Xem">Xem</button>
                            <button type="submit" name="action" value="DELETE_product_cart">Xóa</button>
                            <input type="hidden" name="id" value="<?php echo $productData["id"]; ?>">
                        </form>
                    </td>
                    <?php
                }
        
                echo "</tr>"; // End the current row
            }
            

        }

        $conn->close();
    ?>
    
      <hr>
      <p>Tổng tiền<span class="price" style="color:black"><b><?php echo $tongtien; ?></b></span></p>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("buyButton").addEventListener("click", function (event) {
    var name = document.getElementById("fname").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var address = document.getElementById("adr").value.trim();
    var city = document.getElementById("city").value.trim();

    if (name === "" || phone === "" || address === "" || city === "") {
      alert("Vui lòng nhập đầy đủ thông tin giao hàng.");
      event.preventDefault(); // Ngăn chặn việc submit form nếu thông tin không đầy đủ
    }
  });
});
</script>
</body>
</html>
    