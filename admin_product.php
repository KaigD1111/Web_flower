<!DOCTYPE html>
<html lang="en">
<style>
/* style_admin_product.css */

/* Thêm quy tắc CSS để tăng khoảng cách giữa các ô trong bảng */
table {
    border-collapse: separate;
    border-spacing: 10px; /* Điều chỉnh giảm khoảng cách giữa các ô */
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
}

tr:hover {
    background-color: #f5f5f5;
}

.delete_button, .edit_button {
    padding: 5px 10px;
    margin: 2px;
    cursor: pointer;
}

.delete_button:hover, .edit_button:hover {
    background-color: #ddd;
}

</style>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>

    <link rel="stylesheet" href="style_admin_product.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="container">
        <!-- aside section start-->
        <aside>
            <div class="top">
                <div class="logo">
                    <h2><span class="danger">Flower Store</span></h2>
                </div>
                <div class="close">
                    <span class="material-symbols-outlined">close </span>
                </div>
            </div>
            <!--end top-->
            <div class="sidebar">
                <a href="#">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="Danhsachkhachhang.php" class="">
                    <span class="material-symbols-outlined">person_outline</span>
                    <h3>Khách hàng</h3>
                </a>
                <a href="admin_kho.php">
                    <span class="material-symbols-outlined">insights</span>
                    <h3>Kho hàng</h3>
                </a>
                <a href="mess.php">
                    <span class="material-symbols-outlined">mail_outline</span>
                    <h3>Tin nhắn</h3>
                </a>
                <a href="admin_product.php" class="active">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <h3>Sản phẩm</h3>
                </a>
                <a href="admin_order.php" class="">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <h3>Đơn hàng</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">report_gmailerrorred</span>
                    <h3>Thống kê</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">Settings</span>
                    <h3>Cài đặt</h3>
                </a>
                <a href="them_moi_san_pham.php">
                    <span class="material-symbols-outlined">add</span>
                    <h3>Thêm sản phẩm</h3>
                </a>
                <a href="login.php">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Đăng xuất</h3>
                </a>
            </div>
        </aside>



        <main>
            <!--start recent order-->

                <table>
                    <thead>
                        <tr>
                            <th>STT </th>
                            <th>Tên sản phẩm </th>
                            
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    <div class="recent_order">
                    <h1>Danh sách sản phẩm</h1>
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

                            $sql = "SELECT id,name, gia,image,category FROM ttsp";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $stt=0;
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $stt;?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><img width='100' src='img\<?php echo $row["image"]; ?>' alt="hoa1"></td>
                                        <td><?php echo $row["gia"]; ?></td>
                                        <td><?php echo $row["category"]; ?></td>
                                        <td>
                                        <form action="processing.php" method="post">
                                            <input type="hidden" name="id_delete_product" value="<?php echo $row["id"]; ?>">
                                            <button type="submit" name="action" value="delete_product" class="button delete_button" onclick="return confirm('Are you sure you want to delete this product?')">delete</button>
                                        </form>
                                        <form action="fix_thongtinsanpham.php" method="post">
                                            <input type="hidden" name="id_fix_product" value="<?php echo $row["id"]; ?>">
                                            <button type="submit" name="action" value="update_info_product" class="button edit_button" onclick="return confirm('Are you sure you want to update this product?')">edit</button>
                                            
                                        </form>
                                        </td>
                                    </tr>
                                    <?php $stt+=1;?>
                                    <?php
                                }
                            }
                            $conn->close();
                            ?>

                    </tbody>
                </table>
            </div>

            <!--end recent order-->
        </main>
        <!--main section end-->

        <!--right section start-->
        <div class="right">
            <div class="top">
                <button id="menu_bar">
                    <span class="material-symbols-outlined"><menu></menu></span>
                </button>
                <div class="profile">
                    <div class="info">
                        <p><b>Juliet</b></p>
                        <p>Admin</p>
                        <small class="text-muted"></small>
                    </div>
                    <div class="profile-photo">
                        <img src="C:\xampp\htdocs\Project\Web_flower\img\002.jpg" alt="">
                    </div>
                </div>

            </div>
            <!--end top-->



        </div>

        <!--end right section-->
    </div>
</body>

</html>