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

<!DOCTYPE html>
<html>
<head>   
    <title>Gio hang</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .info{
        background-color: #f0f0f0;
    }
    .form_sp {
        text-align: center; /* Căn giữa */
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

</style>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css">
    <title>Giỏ hàng của bạn</title>
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <?php include('header.php'); ?>
<!-- Your existing script -->
    <h3 class="center-heading">GIỎ HÀNG CỦA BẠN</h3>

<div class="table-container">
    <table class="fixed-table">
    <body>
    <table border="1" class="table_cart">
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
        </tbody>
    </table>
</body>

    </table>
    <form action="Processing.php" method="POST" class="clear-cart-form">
        <input type="hidden" name="acc" value="<?php echo $acc; ?>">
        <input type="submit" name="action" value="Xóa giỏ hàng" class="clear-cart-btn">
    </form>
    <form action="thanhtoangiohang.php" method="POST" class="clear-cart-form">
        <input type="hidden" name="acc" value="<?php echo $acc; ?>">
        <input type="submit" name="action" value="Thanh Toán" >
    </form>
</div>
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
