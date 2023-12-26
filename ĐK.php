<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css"> <!-- Đường dẫn tới file CSS -->
    <title>Dropdown Example</title>
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicsons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css"> <!-- Đường dẫn tới file CSS -->
    <title>Dropdown Example</title>
    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicsons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    form {
    max-width: 90%; /* Set the maximum width of the form */
    margin: auto; /* Center the form on the page */
  }

  .form-label {
    font-size: 14px; /* Adjust the font size of labels */
  }

  .form-control {
    padding: 8px; /* Adjust the padding of form controls */
    font-size: 14px;
   } /* Adjust the*/
   .btn-primary {
    font-size: 16px; /* Adjust the font size of the button */
    width: 10%; /* Set the width to 100% to make it full-width */
    height: 35px;
  }
  .input-style {
            background-color: #f0f0f0; /* Set your desired background color */
            border: 1px solid #ccc; /* Set your desired border color */
            color: #333; /* Set your desired text color */
            /* Add any other styles you want */
        }     
  
      /* When moving the mouse over the close button */
      .alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}
      .closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}
.closebtn:hover {
  color: black;
}

.alert {
  opacity: 1;
  transition: opacity 0.6s; /* 600ms to fade out */
}
</style>

</head>
<body>

    <?php include('header.php'); ?>
<?php

$status = isset($_GET['status']) ? $_GET['status'] : '';
if ($status === 'dangkithanhcong') {
    ?>
            <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Đăng kí thành công
      </div>

<?php
} 
if ($status === 'tentkdatontai') {
  ?>
            <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      Đăng kí thất bại tên tài khoản đã tồn tại
    </div>

<?php
} 
?>
<?php
if ($status === 'MK') {
    ?>
                    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      Mật khẩu bạn nhập chưa giống nhau
    </div>
<?php
} 
?>

<form action="Processing.php" method="post">
        <h2>ĐĂNG KÝ</h2>
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Tên tài khoản:</label>
    <input type="name" class="form-control" id="id" placeholder="Tên tài khoản" name="id">
  </div>
  
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Họ và tên:</label>
    <input type="namefull" class="form-control" id="name" placeholder="Họ và tên" name="name">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Mật khẩu:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pass">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Nhập lại mật khẩu:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Nhập lại mật khẩu" name="pass_again">
  </div>
  <button type="submit" name="action" value="sign" class="btn btn-primary">Đăng ký</button>
</form>
</body>
<?php include('footer.php'); ?>
</html>