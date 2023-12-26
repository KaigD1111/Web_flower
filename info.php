<!DOCTYPE html>
<html lang="vi">
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
    <title>thong tin san pham</title>
    <style>
        .form-container {
            width: 100%;
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
        }

        .form-image {
            width: 400px; /* Đặt chiều rộng tùy thuộc vào kích thước ảnh mong muốn */
            padding: 20px;
        }

        .form-ft {
            padding: 20px;
        }
    </style>

</head>
<body>
<?php include('header.php'); ?>
<!-- Your existing script -->
<div class="form-container">
<table class="form-table">
        <tr>
        <td class="form-image">
            <?php
            if (isset($_GET["id"])) {
                $id = ($_GET["id"]);
            } else {
                    echo "NO have ID .";
            }
            $mt;
            // connet sql
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flower";
            
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM ttsp WHERE id = '$id'";
            $result = $conn->query($sql);
            
            // check and ... 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    //echo "ID: " . $row["id"]. "<br>";
                    $ten=$row['name'];
                    $mt = $row["mota"];
                    $anh = 'img/' . $row["image"];
                if (file_exists($anh)) {
                    echo "<img src='$anh' alt='Ảnh sản phẩm' width='400' height='400'>" ;
                } else {
                    echo "<p>Đường dẫn ảnh không tồn tại.</p>";
                }
                }
            } else {
                echo "not find row have ID = $id";
            }
            $conn->close();
            
            ?>
        </td>

        <td class="form-ft">
            <form action="Processing.php" method="post">
            <label for="input1">Tên sản phẩm:</label>
                <p><?php echo $ten ?></p> <!-- Mô tả -->
                <label for="input1">Mô tả:</label>
                <p><?php echo $mt ?></p> <!-- Mô tả -->

                <label for="sl_sp">Số lượng:</label>
                <input type="number" name="sl_sp" value="1" min="1"> <!-- Input số lượng -->

                <p><?php echo "ID: " . $_GET["id"] ?></p>
                <input type="hidden" name="id_sp" value="<?php echo $_GET["id"] ?>">

                <input type="submit" name="action" value="Thêm vào giỏ">
                <input type="submit" name="action" value="Mua ngay">
                <!--<input type="submit" name="action" value="Mua ngay">-->
            </form>

        </td>

        <td class="form-ft">
            <form action="Processing.php" method="post">
                <input type="hidden" name="id_sp" value="<?php echo $_GET["id"] ?>">
                <input type="hidden" name="action" value="comment">
                <input class="form-control me-2" type="text" id="comment" name="comment" placeholder="viết bình luận sản phẩm của bạn" value="">
                <!--<input type="submit" name="action" value="Mua ngay">-->
            </form>
            <form action="Processing.php" method="post">
                <?php
                if (isset($_GET["id"])) {
                    $id = ($_GET["id"]);
                } else {
                        echo "NO have ID .";
                }

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "flower";
                
                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Kết nối không thành công: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM comment WHERE id_product = '$id'";
                $result = $conn->query($sql);

                // check and ... 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "Comment from: " . $row['id_cus_comment'] . " : " . $row['content_comment'] . "<br>";
                        
                    }
                } else {
                    echo "chưa có bình luận cho sản phẩm : $id";
                }
                $conn->close();
                
                ?>
            </form>
        </td>
        </tr>
    </table>
<?php include('footer.php');?>
</body>
</html>