<!DOCTYPE html>
<link rel="stylesheet" href="style_thanhtoangiohang.css" />
<?php 
    //include('account.php');
    session_start();    
    $acc = $_SESSION['acc'];
    $my_bag="";

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flower";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Thực hiện câu lệnh SQL SELECT
    //echo "acc ".$acc;

    $conn->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css"> <!-- Đường dẫn tới file CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        
        .container-table {
            width: 100%;
            display: table;
            border-collapse: collapse;
        }

        .table-container {
            width: 50%;
            display: table-cell;
            border: 1px solid #ccc;
            padding: 1px;
            box-sizing: border-box;
            vertical-align: top; /* Đặt chiều dọc của table-cell */
            overflow: auto;
        }
    </style>
    <title>Two Tables in One</title>
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

    <div class="container-table">
        <!-- Bảng bên trái -->
        <div class="table-container">
            <h2>Điẻn thông tin thanh toán</h2>
            <form action="Processing.php" method="POST">
        <div class="checkout-body flex">
          
          <div class="left-col" style="width: 90%;">  <!-- kích thươc cai bang dien thong tin  -->
            <div class="infor-form flex flex-col">
              <!-- GENDER: Start -->
              <div class="gender flex">
                <div>
                  <input
                    class="square-radio" type="radio" name="gender" id="nam" required/>
                  <label for="nam">Nam</label>
                </div>

                <div>
                  <input
                    class="square-radio" type="radio" name="gender" id="nu" />
                  <label for="nu">Nữ</label>
                </div>
              </div>
              <!-- GENDER: End -->

              <!-- NAME: Start -->
              <input
                type="text" name="name"
                placeholder="Họ tên*"
                required
                class="input-char" 
                aria-required="true"/>
              <!-- NAME: End -->

              <!-- PHONE NUMBER: Start -->
              <input
                type="text"
                name="sdt"
                placeholder="SĐT*"
                aria-required="true"
                required
                class="input-char" 
                pattern="(\+84|0)\d{7,10}"/>
              <!-- PHONE NUMBER: End -->

              <!-- ADDRESS: Start -->
              <div class="address width-50-30">
                <!-- City -->
                <select
                  class="input-char"
                  id="city"
                  aria-label=".form-select-sm"
                  data-live-search="true">
                  <option value="" selected disabled>Chọn tỉnh thành</option>
                </select>

                <select
                  class="input-char"
                  id="district"
                  aria-label=".form-select-sm"
                  data-live-search="true">
                  <option value="" selected disabled>Chọn quận huyện</option>
                </select>
              </div>

              <div class="address width-50-50">
              <select
                class="input-char"
                id="ward"
                aria-label=".form-select-sm"
                data-live-search="true">
                <option value="" selected disabled>Chọn phường xã</option>
              </select>
              <input
                type="text"
                name="address"
                placeholder="Ấp, Hẻm, số nhà,...*"
                required
                class="input-char" />
              </div>             
              <!-- ADDRESS: End -->

              <!-- Required field: start -->
              <small class="gray-text">*Required field</small>
              <!-- Required field: End -->
            </div>
            <!-- OTHER ADDRESS: End -->
              <!-- master card -->
        
              <!-- buy -->
              <input type="submit" name="action" value="Mua giỏ hàng">
              <input class="buy-btn btn" type="submit" name="action" value="Mua giỏ hàng" />
              <!-- accept rule -->
              <input type="checkbox" id="accept-rule" required/>
              <label for="accept-rule" class="gray-text"
                ><small>
                  Tôi đồng ý chính sách bảo mật của cửa hàng.</small
                ></label
              >
            </div>
            <!-- BUY SECTION: Start -->
          </div>
        </div>

        
        <!-- Bảng bên phải -->
        <div class="table-container">
            <h2>Đơn Hàng </h2>
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
        $sql = "SELECT id_product, number_products FROM cart where id_acc=$acc";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Start a new row for each product
        
                $id_product = $row['id_product'];
                $number_products = $row['number_products'];
                $productQuery = "SELECT id, name,image FROM ttsp WHERE id = '$id_product'";
                $productResult = $conn->query($productQuery);
        
                if ($productResult->num_rows > 0) {
                    $productData = $productResult->fetch_assoc();
                    ?>
                    <td>
                        
                        <img width='100' src='img/<?php echo $productData["image"]; ?>' alt='Mô tả hình ảnh'>
                    </td>
                    <td><?php echo $productData["name"]; ?></td>
                    <td><?php echo $number_products; ?></td>
                    <td>
                        <form action="Processing.php" method="POST">
                            <input type="submit" name="action" value="Xem">
                            <input type="submit" name="action" value="DELETE_product_cart">
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
            <table>
                <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                </tr>
                <tr>
                    <td>Data 1</td>
                    <td>Data 2</td>
                </tr>
                <!-- Thêm dữ liệu của bạn ở đây -->
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="../../../js/store/cart-checkout/checkout/checkout.js"></script>
    <!-- js: end -->
    <?php include('footer.php');?>
</body>
<?php
function findNumberAfterString($inputString, $searchString) {
    // Sử dụng biểu thức chính quy để tìm số đứng sau chuỗi
    $pattern = '/' . preg_quote($searchString, '/') . '(\d+)/';
    preg_match($pattern, $inputString, $matches);

    // Trả về số đứng sau chuỗi nếu tìm thấy, ngược lại trả về null
    return isset($matches[1]) ? $matches[1] : null;
}
?>
</html>
