<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <script type="module" src="https://unpkg.com/ionicsons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- icon -->


    <title>Thêm sản phẩm</title>
    <!-- icon -->
    <link rel="shortcut icon" href="image/logo.png">
    <!--<link rel="stylesheet" href="addproductmanagement.css" />-->
    <style>
    input, select, textarea {
    box-sizing: border-box;
    width: 100%;
    height: 40px;
    padding: 8px; /* Adjust the padding as needed */
    margin: 5px 0; /* Adjust the margin as needed */
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
}


input[type="submit"], .Huy {
    background-color: black;
    color: white;
    padding: 8px 12px; /* Adjust the padding to make the buttons smaller */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 70px;
    margin-right: 20px; /* Add some space between buttons */
    font-size: 14px; /* Adjust the font size to make the text smaller */
}
input[type="submit"], .Add {
    background-color: black;
    color: white;
    padding: 8px 12px; /* Adjust the padding to make the buttons smaller */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 90px;
    height: 40px;
    margin-right: 30px; /* Add some space between buttons */
    font-size: 14px; /* Adjust the font size to make the text smaller */
}
.form-control{
    width: 30%;
    frontsize: 10px;
}
body {
    display: flex;
    justify-content: center;
    align-items: center;
   
}

.container {
    width: 80%;
    background-color: #fff; /* Optional: Add a background color for better visibility */
    padding: 20px; /* Optional: Add some padding inside the container */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle box shadow */
}
ion-icon[name="close-outline"] {
        position: absolute; /* Set the position of the close icon to absolute */
        top: 0; /* Position it at the top of the container */
        right: 180px; /* Position it at the left of the container */
        margin: 10px; /* Add some margin for spacing */
        font-size: 24px; /* Adjust the font size of the close icon */
        cursor: pointer; /* Add cursor pointer for interaction */
  } 
  .top{
    color:chocolate;
    font-size: 16px;
  }
  .row {
            margin-bottom: 20px; /* Tăng giá trị này để làm cho khoảng cách giữa các nút lớn hơn */
        }
  .Add, .Huy, .back {

            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 100px; /* Điều chỉnh khoảng cách giữa các nút */
        }

        .Add:hover, .Huy:hover, .back:hover {
            background-color: #45a049;
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
$status = isset($_GET['status']) ? $_GET['status'] : '';

?>
</head>
<script>
function validateForm() {
    var productName = document.getElementById('fname').value;
    var productPrice = document.getElementById('lname').value;
    var productImage = document.getElementById('product-name').value;
    var productSize = document.getElementById('country').value;
    var kho = document.getElementById('product').value;
    var slInKho = document.getElementById('fname').value;
    var category = document.getElementById('fname').value;
    var productDescription = document.getElementById('subject').value;

    // Check if any of the required fields are empty
    if (productName === '' || productPrice === '' || productImage === '' || productSize === '' || kho === '' || slInKho === '' || category === '' || productDescription === '') {
        alert('bạn chưa điền đẩy đủ thông tin.');
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}
</script>
<body>
<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';

if ($status === 'đã thêm khong thanh công') {
    ?>
          <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        đã thêm khong thành công.
      </div>
       
<?php
}
if ($status === 'đã thêm thanh công') {
  ?>
        <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
     thêm hoa thành công
    </div>
     
<?php
}
?>


    <script>
        function redirectToHome() {
            window.location.href = 'them_moi_san_pham.php';
        }
    </script>
<div class="container">
<form action="processing.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
  <div class="top">
                <div class="logo">
                    <h2><span class="danger">Flower Store</span></h2>
                </div>
            </div>
    <h3>THÊM MỚI SẢN PHẨM</h3>
  <ion-icon name="close-outline"></ion-icon>
    <div class="row">
      <div class="col-25">
        <label for="fname">Tên Sản Phẩm</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="product-name" placeholder="Tên hoa">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Giá</label>
      </div>
      <div class="col-75">
        <input type="number" id="lname" name="product-price" placeholder="Giá">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Hình ảnh</label>
      </div>
      <div class="col-75">
      <input type="file" id="product-name" name="product-image" class="form-control">
                            <div class="image-box"></div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="Kích thước">Kích thước</label>
      </div>
      <div class="col-75">
        <select id="country" name="product-size">
          <option value="Vừa">Vừa</option>
          <option value="Nhỏ">Nhỏ</option>
          <option value="Lớn">Lớn</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Danh mục sản phẩm">Thêm vào kho</label>
      </div>
      <div class="col-75">
            <select id="product" name="kho">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flower";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM kho";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['id_kho']; ?>">
                        <?php echo $row['id_kho']; ?>
                    </option>
                    <?php
                }
            }
            ?>
        </select>
          <div class="row">
          <div class="col-25">
            <label for="fname">Số lượng trong kho</label>
          </div>
          <div class="col-75">
            <input type="text" id="fname" name="sl_in_kho" placeholder="">
          </div>
        </div>
        <div class="col-25">
        <label for="Danh mục sản phẩm">danh mục</label>
      </div>
        <input type="text" id="fname" name="category" placeholder="danh mục ">
        
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Mô tả" name="description">Mô tả</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="product-description" placeholder="Viết gì đó..." style="height:200px"></textarea>
      </div>
    </div>
    
    <div class="row">
    <input type="submit" class="Add" name="action" value="ADD New Product" onclick="return validateForm()">

  </div>
  </form>
  <form action ="them_moi_san_pham.php">
  <input type="submit" class="Huy" name="action" value="Hủy thêm sản Phẩm" >
  </form>
  <form action ="admin_product.php">
  <input type="submit" class="back" name="action" value="Quay về trang chính" >
  </form>

</div>
</body>
</html>