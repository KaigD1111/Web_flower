<!DOCTYPE html>
<html lang="en">
<head>
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
</style>
</head>
<body>

    <?php include('header.php'); ?>

    <!-- show cac san pham-->
<?php
function displayProductTable($searchKeyword = '') {
    // Kết nối đến cơ sở dữ liệu
    ?>
    <div class="table-container">
    <table class="fixed-table">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flower";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
    // Truy vấn SQL để lấy dữ liệu
    $sql = "SELECT id,name,gia FROM ttsp";
    $result = $conn->query($sql);
    $columnCount = 0; // Đếm số cột đã thêm vào hàng
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($columnCount === 0) {
                echo "<tr>"; // Bắt đầu một hàng mới
            }
            //echo "Search Keyword: " . $searchKeyword;
            if (isWordInString($searchKeyword, $row["name"] . '.jpg')) # tìm kiếm sans phâmr
            {
                echo "<td>";
                ?>
                <div class="form_sp">
                    <form action="Processing_Info_Or_Delete.php" method="POST">
                        <!--<img class="sp-image" src="img/ <?php echo $row["id"] . '.jpg'; ?>" alt="Mô tả hình ảnh">-->
                        <button type="submit" name="action" value="Xem" style="background-image: url('img/<?php echo $row["id"] . '.jpg'; ?>'); background-size: cover; width: 150px; height: 150px;">
                            <span style="display: none;"><?php echo $row["name"] . '.jpg'; ?></span>
                        </button>
                        <label class="sp-label" for="inputData"><?php echo $row["name"] . '.jpg'; ?></label>
                        <label class="sp-price" for="inputData"><?php echo $row["gia"] ; ?></label>
                        
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </form>
                </div>
                </td>
                <?php
                $columnCount++;

                if ($columnCount === 3) {
                    echo "</tr>"; // Đóng hàng nếu đã đủ 3 cột
                    $columnCount = 0; // Đặt lại số cột đếm
                }
            }
        }
    } else {
        echo "<tr><td colspan='3'>Không có dữ liệu.</td></tr>";
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
}
$searchKeyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
displayProductTable($searchKeyword);

// To use the function

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
    </table>
</div>
<?php include('footer.php');?>
</body>
</html>