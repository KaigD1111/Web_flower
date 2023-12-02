<!DOCTYPE html>
<html>
<head>
    <title>LA MAISION</title>
    <meta charset="UTF-8">
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
    <link rel="stylesheet" href="header.css"> 
    <link rel="stylesheet" href="styleheader.css"> <!-- Đường dẫn tới file CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php include('header.php'); ?>

<form action="add_data.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Bạn đã có tài khoản chưa?</h1>

    <hr>
    <label for="Name"><b>Họ và Tên</b></label>
    <input type="text" placeholder="Nhập Họ và Tên" id="ten" name="name" required>
    <label for="sex"><b>Giới tính</b></label> <br>
    <input type="radio" id="Nu" name="sex" value="Nu"> Nữ
    <input type="radio" id="Nam" name="sex" value="Nam"> Nam <br><br>
    <label for="birthday"><b>Ngày sinh:<b></label> <br>
    <input type="date" id="birthday" name="birthday">
    <br><br>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Nhập Email" id="email" name="email" required>
    

    <label for="mk"><b>Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" id="mk" name="password" required>

    <label for="mk"><b>Nhập lại mật khẩu</b></label>
    <input type="password" placeholder="Nhập lại mật khẩu" id="mk" name="password" required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Ghi nhớ mật khẩu
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <label for="phone">Số điện thoại:</label>
    <input type="tel" id="phone" name="id">
    <div class="clearfix">
      <button type="button" class="cancelbtn">Hủy bỏ</button>
      <button type="submit" class="signupbtn">Đăng ký</button>
    </div>
  </div>
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