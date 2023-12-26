<?php 
    //include('account.php');
    //session_start();    
    //$acc = $_SESSION['acc'];
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
<?php include('header.php'); ?>
<!DOCTYPE html>
<html>
<head>   
    <title>Gio hang</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <title>Giỏ hàng của bạn</title>
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<style>
    .info{
        background-color: #f0f0f0;
    }
    

    .sp-image {
        width: 200px; /* Độ rộng của hình ảnh */
    }

    .sp-label {
        display: block; /* Hiển thị label như một phần tử block */
        margin-top: 5px; /* Khoảng cách giữa hình ảnh và label */
    }
    th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 100 px;
        }
    .table_cart {
        width: 800px; /* Adjust the width as needed */
    }    
    
.button {
  background: #fff;
  backface-visibility: hidden;
  border-radius: .375rem;
  border-style: solid;
  border-width: .125rem;
  box-sizing: border-box;
  color: #212121;
  cursor: pointer;
  display: inline-block;
  font-family: Circular,Helvetica,sans-serif;
  font-size: 1.125rem;
  font-weight: 700;
  letter-spacing: -.01em;
  line-height: 1.3;
  padding: .875rem 1.125rem;
  position: relative;
  text-align: left;
  text-decoration: none;
  transform: translateZ(0) scale(1);
  transition: transform .2s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button:not(:disabled):hover {
  transform: scale(1.05);
}

.button:not(:disabled):hover:active {
  transform: scale(1.05) translateY(.125rem);
}

.button:focus {
  outline: 0 solid transparent;
}

.button:focus:before {
  content: "";
  left: calc(-1*.375rem);
  pointer-events: none;
  position: absolute;
  top: calc(-1*.375rem);
  transition: border-radius;
  user-select: none;
}

.button:focus:not(:focus-visible) {
  outline: 0 solid transparent;
}

.button:focus:not(:focus-visible):before {
  border-width: 0;
}

.button:not(:disabled):active {
  transform: translateY(.125rem);
}
.cart-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}    
.clear-cart-form {
        flex: 1;
        margin-right: 10px; /* Để tạo khoảng cách giữa các button (tuỳ chỉnh theo nhu cầu) */
    }

    .button {
        width: 100%;
        box-sizing: border-box;
    }
    #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
  align-items: center;
}

#customers td, #customers th {
  border: 0px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

.table-container {
        display: flex;
        flex-direction: column;
        align-items: center; /* Căn giữa theo chiều ngang */
        height: 100vh; /* Sử dụng chiều cao của màn hình để căn giữa */
        margin-bottom: 35px;
    }

   
    .cart-button {
  appearance: none;
  background-color: #FAFBFC;
  border: 1px solid rgba(27, 31, 35, 0.15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, 0.04) 0 1px 0, rgba(255, 255, 255, 0.25) 0 1px 0 inset;
  box-sizing: border-box;
  color: #24292E;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
  font-size: 14px;
  font-weight: 500;
  line-height: 20px;
  list-style: none;
  padding: 6px 16px;
  position: relative;
  transition: background-color 0.2s cubic-bezier(0.3, 0, 0.5, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
  word-wrap: break-word;
}

.cart-button:hover {
  background-color: #F3F4F6;
  text-decoration: none;
  transition-duration: 0.1s;
}

.cart-button:disabled {
  background-color: #FAFBFC;
  border-color: rgba(27, 31, 35, 0.15);
  color: #959DA5;
  cursor: default;
}

.cart-button:active {
  background-color: #EDEFF2;
  box-shadow: rgba(225, 228, 232, 0.2) 0 1px 0 inset;
  transition: none 0s;
}

.cart-button:focus {
  outline: 1px transparent;
}

.cart-button:before {
  display: none;
}

.cart-button:-webkit-details-marker {
  display: none;
}
</style>
<body>
    
<!-- Your existing script -->
    <h3 class="center-heading">GIỎ HÀNG CỦA BẠN</h3>

<div class="table-container">
    <table class="fixed-table" style="align-items: center;">
    
    <table class="table_cart" style="border: 0; margin-bottom:30px" id="customers">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $columnCount = 0;
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
                                <button class="cart-button" type="submit" name="action" value="Xem">Xem</button>
                                <button  class="cart-button" type="submit" name="action" value="DELETE_product_cart">Xóa</button>
                                <input  class="cart-button" type="hidden" name="id" value="<?php echo $productData["id"]; ?>">
                            </form>
                        </td>
                        <?php
                    }
            
                    echo "</tr>"; // End the current row
                }
            }
            $conn->close();
            ?>
        </tbody>
    </table>


    </table>
    <div class="cart-container">
        <div class="row">
        <div class="col"><form action="Processing.php" method="POST" class="clear-cart-form">
            <input type="hidden" name="acc" value="<?php echo $acc; ?>">
            <input class="cart-button" type="submit" name="action" value="Xóa giỏ hàng" >
        </form></div>
        <div class="col"><form action="Thanhtoan2.php" method="POST" class="clear-cart-form">
            <input type="hidden" name="acc" value="<?php echo $acc; ?>">
            <input class="cart-button" type="submit" name="action" value="Thanh Toán" >
        </form></div>
            <div class="col">
            <form action="Processing.php" method="POST" class="clear-cart-form">
           
            <input class="cart-button" type="submit" name="action" value="Xem tiếp" >
        </form>

            </div>
        </div>
    </div>
</div>

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
<?php include('footer.php');?>
</body>
</html>
