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

                <a href="Danhsachkhachhang.php" class="">
                    <span class="material-symbols-outlined">person_outline</span>
                    <h3>Khách hàng</h3>
                </a>
                <a href="" class="active">
                    <span class="material-symbols-outlined">insights</span>
                    <h3>Kho hàng</h3>
                </a>
                <a href="mess.php">
                    <span class="material-symbols-outlined">mail_outline</span>
                    <h3>Tin nhắn</h3>
                </a>
                <a href="admin_product.php" class="">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <h3>Sản phẩm</h3>
                </a>
                <a href="admin_order.php" >
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
            <div class="recent_order">
                <h1>Quản lý kho </h1>
                <table>
                    <thead>
                        <tr>
                            
                            <th>MÃ kho </th>
                            <th>Địa chỉ</th>
                            <th>Tên kho</th>
                            
                            <th>Trạng thái</th>
    
                            <th>Xóa</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                    <div class="recent_order">
                    <h1>Danh sách nhà kho</h1>
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

                            $sql = "SELECT * FROM `kho`";
                            $result = $conn->query($sql);
                            $stt=0;

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    ?>
                                    <tr>
                                       
                                        <td><?php echo $row["id_kho"]; ?></td>
                                        <td><?php echo $row["address_kho"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>

                                        <td><?php echo $row["state"]; ?></td>

                                        <td>
                                        <form action="processing.php" method="post">
                                            <input type="hidden" name="id_kho" value="<?php echo $row["id_kho"]; ?>">
                                            <button type="submit" name="action" value="delete_kho" class="button delete_button" onclick="return confirm('bạn có chắc xóa kho hàng này')">Xóa</button>
                                        </form>
                                        </td>
                                        <td>
                                        <form action="xem_va_sua_kho.php" method="post">
                                            <input type="hidden" name="id_kho" value="<?php echo $row["id_kho"]; ?>">
                                            <button type="submit"  class="button" name="action" value="fix_kho"  onclick="return confirm('Are you sure you want to view this other?')">Xem và Sửa</button>
                                        </form>
                                        <td>
                                        </td>

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
                            <td>862f1akj23312d</td>
                            
                            <td>HCM</td>
                            <td>kho Linh Trung</td>
                            <td>Đã hủy</tr>
                            
                        <tr>
                        </tr>
                    </tbody>
                </table>
                <a href="taokhohang.php">
                    <span class="material-symbols-outlined">add</span>
                    <h3>Thêm kho</h3>
            </a>
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