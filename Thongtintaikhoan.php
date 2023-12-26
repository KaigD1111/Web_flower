<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
<style>
body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-size: cover;
            background-position: center;
        }

        .Thongtin {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(30, 1, 1, 0.938);
            padding: 20px;
            width: 90%; /* Chiều rộng 100% */
            height: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            overflow-x: auto; /* Thêm thanh trượt ngang nếu nội dung quá rộng */
        }

        img {
            width: 300px;
            height: auto;
            margin-left: 50px;
        }

        th, td {
            font-size: larger;
            padding: 10px;
            text-align: left;
            border: none;
        }

        input {
            width: 300px;
            padding: 8px;
            margin-bottom: 10px;
            background-color: #f2f2f2;
        }
        .button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.button-container button {
    background: black;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.5s;
    font-weight: bolder;
    border: none;
}

.button-container button:hover {
    background-color: rgb(245, 245, 245);
    color: black;
}

/* Khoảng cách giữa các nút button */
.button-container button + button {
    margin-left: 10px; /* Điều chỉnh khoảng cách giữa các nút button */
}
    </style>
</head>
<body>
    
<?php
        session_start();
        // Truy cập giá trị của biến toàn cục $acc
        $acc = $_SESSION['acc'];
            $columnCount = 0;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flower";
            
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }

            $sql = "SELECT id,name,phone,mail,address FROM client where id='$acc'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $name=$row['name'];
                $phone=$row['phone'];
                $mail=$row['mail'];
                $address=$row['address'];
                $id=$row['id'];
            }
            ?>
<div class="Thongtin">
        <h2 align="center">Thông tin tài khoản</h2>
        <form id="motathongtin" action="Processing_login.php" method="POST"></form>
        <table class="main"  boder="0">
            <tr cosplay="2">
                <td>
                    <figure align="center">
                        <img src="account_icon.png" alt="Hình ảnh tài khoản"><br>
                        <figcaption>Tên tài khoản: <?php echo $id?></figcaption>
                    </figure>
                </td>
            <td>
            <table boder=1 class="thongtin">
            <tr>
                <td>Họ và tên:</td>
                <td><input type="text" name="ten" value=<?php echo $name?>></td>
            </tr>
            <tr>
                <td>Địa chỉ email:</td>
                <td><input type="email" name="emai;" value=<?php echo $mail?>></td>
            </tr>
            <tr></tr>
                <td>Số điện thoại:</td>
                <td><input type="phone" name="phone" value=<?php echo $phone?>></td>
            </tr> 
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="address" name="address" value=<?php echo $address?>></td>
            </tr> 
            </table>
            </td>
            </tr>
        </table>
    </form>
    <form action ='processing.php' method = "post">
    <div class="button-container" >
    <button type="submit" name="action" value="go_change_pass" >Đổi mật khẩu</button>
    <button type="submit" name="action" value="go_fix_info" >Sửa thông tin</button>
    
    <button type="submit" name="action" value="kiểm tra hóa đơn" >Kiểm tra hóa đơn</button>
    <button type="submit" name="action" value="Về trang chủ" >Về trang chủ</button>
</div>

</form>


</div>
</body>
</html>