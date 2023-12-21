<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>

    <link rel="stylesheet" href="style_admin_product.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
.hidden {
    display: none;
}

</style>
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

                <a href="#" class="">
                    <span class="material-symbols-outlined">person_outline</span>
                    <h3>Khách hàng</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">insights</span>
                    <h3>Phân tích</h3>
                </a>
                <a href="mess.php">
                    <span class="material-symbols-outlined">mail_outline</span>
                    <h3>Tin nhắn</h3>
                </a>
                <a href="#" class="">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <h3>Sản phẩm</h3>
                </a>
                <a href="admin_order.php" class="active">
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
                <a href="#">
                    <span class="material-symbols-outlined">add</span>
                    <h3>Thêm sản phẩm</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Đăng xuất</h3>
                </a>
            </div>
        </aside>



        <main>

            <!--start recent order-->
            <div class="recent_order">
                <h1>Đơn hàng</h1>
                <table>
                    <thead>
                        <tr>
                            
                            <th>Mã đơn hàng </th>
                            <th>Địa chỉ</th>
                            <th>Ngày đặt hàng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Trạng thái</th>
                            <th>xóa</th>
                            <th>xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
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

                            $sql = "SELECT * FROM `order`";
                            $result = $conn->query($sql);
                            $stt=0;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    ?>
                                    <tr>
                                       
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["address"]; ?></td>
                                        <td><?php echo "ngày đặt hàng chưa làm"; ?></td>
                                        <td><?php echo "PTTT chưa làm"; ?></td>
                                        <td><?php echo "trạng thái chưa "; ?></td>
                                        <td>
                                            <button class="button" onclick="showMessagesForm(<?php echo $stt?>)">Xem chi tiết </button>
                                        </td>
                                        <td>
                                        <form action="processing.php" method="post">
                                            <input type="hidden" name="id_order_delete" value="<?php echo $row["id"]; ?>">
                                            <button type="submit" name="action" value="delete_order" class="button delete_button" onclick="return confirm('Are you sure you want to delete this other?')">delete</button>
                                        </form>
                                        </td>
                                        <td>
                                        <div id="messagesForm<?php echo $stt?>" class="hidden">
                                            <h2>Form Xem chi tiết hóa đơn</h2>
                                            <?php
                                            echo "alo ";
                                            $conn_detail = new mysqli($servername, $username, $password, $dbname);
                                            #$sql_detail_hd = "SELECT id_product , number_product FROM 'detail_order' where id='{$row['id']}'";
                                            #$result_detail_hd = $conn->query($sql_detail_hd);
                                            $query = "
                                                SELECT order.id as id_order,ttsp.id as id_product,detail_order.number_product as number_product 
                                                ,order.id_cus as id_KH , client.name as name_KH ,ttsp.name as name_sp , ttsp.gia as gia,ttsp.image as image
                                                FROM detail_order
                                                INNER JOIN `order` ON detail_order.id_order = `order`.id
                                                INNER JOIN ttsp ON detail_order.id_product = ttsp.id
                                                INNER JOIN client ON client.id = order.id_cus 
                                                where order.id='{$row['id']}'";
                                                $result_query = $conn_detail->query($query);
                                                if ($result_query->num_rows > 0) {
                                                    $tongtien = 0;
                                                    while ($row_query = $result_query->fetch_assoc()) {
                                                        echo '<p>ID Khách hàng: ' . $row_query['id_KH'] . '</p>';
                                                        echo '<p>Tên Khách hàng: ' . $row_query['name_KH'] . '</p>';
                                                        echo '<p>Tên Sản phẩm: ' . $row_query['name_sp'] . '</p>';
                                                        echo '<p>Giá: ' . $row_query['gia'] . '</p>';
                                            
                                                        // Tính tổng tiền
                                                        $tongtien += (int)$row_query['gia'];
                                                }
                                                echo '<p>Tổng tiền: ' . $tongtien . '</p>';
                                                echo '<button onclick="hideMessagesForm(' . $stt . ')">Đóng</button>';
                                            }
                                            #$conn_detail->close();
                                            ?>
                                                
                                            <!-- Add your form elements for viewing messages here -->
                                            
                                        </div>
                                        </td>
                                        <?php  $stt = $stt+1 ?>
                                    </tr>
                                    <?php
                                }
                            }
                            $conn->close();
                            ?>

                    </tbody>
                        <tr>
                            <td>1</td>
                            <td>ĐH01</td>
                            <td>Chi</td>
                            <td>HCM</td>
                            <td>17/12/2023</td>
                            <td>COD</td>
                            <td>1 hoa hướng dương</td>
                            <td>150000</td>
                            <td>Đang vận chuyển</tr>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
            <script>
    function showMessagesForm(stt) {
        alert("Xem tin nhắn button clicked!" +'#messagesForm' + stt);
        var messagesForm = document.querySelector('#messagesForm' + stt);
        messagesForm.classList.toggle('hidden');
    }
</script>
<script>
    function hideMessagesForm(id) {
        var form = document.getElementById('messagesForm' + id);
        form.style.display = 'none';
    }
</script>
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