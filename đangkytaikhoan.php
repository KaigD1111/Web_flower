<!DOCTYPE html>
<html>
<head>
    <title>LA MAISION</title>
    <meta charset="UTF-8">
    <style>
      
        table {
            width: 100%; 
        }
        td {
            width: 25%; 
            padding: 10px; 
        }
    </style>
    <style>
        .center-heading {
            text-align: center;
        }
    </style>
    <style>
        .info{
            background-color: #f0f0f0;
        }
    </style>
    <link rel="stylesheet" href="style.css"> <!-- Đường dẫn tới file CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
    <?php include('header.php'); ?>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Trang chủ
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sản phẩm 
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Về chúng tôi
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Liên hệ
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <form action="creat_data.php" method="post">
    </form>
    <h2>Bạn có tài khoản?</h2>

<style>
   
    label {
        display: inline-block;
        margin-right: 10px; 
    }
    
    input[type="radio"] {
        vertical-align: middle;
    }
</style>
<form action="add_data.php" method="post">
    <table class="thongtin"
    <label for="ten">Ten:</label>
    <input type="text" id="ten" name="name" required><br><br>
    <p>Giới tính:</p>
    <input type="radio" id="Nu" name="sex" value="Nu"> Nữ
    <input type="radio" id="Nam" name="sex" value="Nam"> Nam

    <label for="birthday">Ngay sinh:</label>
    <input type="date" id="birthday" name="birthday">
    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email"> <br><br>
    <label for="mk">Mật khau:</label>
    <input type="password" id="mk" name="password"> <br><br>
    <label for="phone">Số điện thoại:</label>
    <input type="tel" id="phone" name="id">
    <br><br>
    <button type="submit">Đăng ký</button>
</table>
</form>
<script>
    var lastChecked = null;
    
    function changeValue(value) {
        var currentChecked = document.querySelector('input[name="sex"]:checked');
        if (currentChecked !== lastChecked && lastChecked !== null) {
            lastChecked.checked = false;
        }
        lastChecked = currentChecked;
        document.querySelector('input[name="sex"]:checked').value = value;
    }
</script>
<?php include('footer.php');?>
</body>
<html>