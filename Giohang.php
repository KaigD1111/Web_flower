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
    echo "acc ".$acc;
    $sql = "SELECT gio FROM client WHERE id = '$acc'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Có ít nhất một hàng được trả về
        $row = $result->fetch_assoc();
        $my_bag = $row['gio'];
        echo "Giá trị của cột 'gio' cho hàng có id = 000 là: " .  $my_bag;
    } else {
        echo "Không tìm thấy ";
    }

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
</style>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        $sql = "SELECT id,name FROM ttsp";
        $result = $conn->query($sql);

        $columnCount = 0; // Đếm số cột đã thêm vào hàng
        $my_bags=[];
        $dem=0;
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {   if ($columnCount === 0) 
                {
                    echo "<tr>"; // row new i
                }
                if (strpos($my_bag, $row["id"]) !== false) 
                {
                    $my_bags[$dem]=$row["id"];
                    ?>
                    <td>
                    <form action="Processing_Info_Or_Delete.php" method="POST">
                        <?php $sl = findNumberAfterString($my_bag, "ID_" . $row["id"] . "_SL_");
                        //echo "ID_" . $row["id"] . "_SL_" . "sllll" . $sl ?>
                        <img width='100' src='img/<?php echo $row["id"] . '.jpg'; ?>' alt='Mô tả hình ảnh'>
                        <label for="inputData">'<?php echo $row["name"]; ?>'</label>
                        <label for="slData">'<?php echo $sl; ?>'</label>
                        <input type="submit" name="action" value="Xem">
                        <input type="submit" name="action" value="DELETE">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="acc" value="<?php echo $acc; ?>">
                    </form>
                    </td>
                    <?php 
                    $columnCount++;
                    if($columnCount == 1)
                    {
                        $columnCount=0;
                    }
                } 
            }
        }
        $conn->close();
    ?>
        </body>
    </table>
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
