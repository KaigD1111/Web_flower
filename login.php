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
  .alert {
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}

/* The close button */
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

/* When moving the mouse over the close button */
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
        $acc = null;
        $_SESSION['acc'] = $acc; // Set $_SESSION['acc'] to null
?>
<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
if ($status === 'sai') {
    ?>
      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Đăng nhập thất bại : sai tên tài khoản hoặc mật khẩu.
      </div>
       
<?php
} 

if ($status === 'doimkthanhcong') {
  ?>
        <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Đổi mật khẩu thành công : vui lòng đăng nhập lại.
      </div>
      
<?php
} 
?>
    <form action="processing.php" method="post">
        <h2>ĐĂNG NHẬP</h2>
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Tên đăng nhập:</label>
    <input type="name" class="form-control" id="name" placeholder="Tên đăng nhập" name="ten_tk">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Mật khẩu:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="mk">
  </div>
  <div class="form-check mb-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember"> Remember me  <a href="#" onclick="location.href='./ĐK.php'">
          <span class="material-symbols-outlined"> Đăng ký </span>
        </a>
    </label>
  </div>
  <button type="submit" class="btn btn-primary" name="action" value ="LOGIN">Đăng nhập</button>
</form>
</body>
<?php include('footer.php'); ?>
</html>