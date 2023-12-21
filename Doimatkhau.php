
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="header.css"> <!-- Đường dẫn tới file CSS -->
    <title>Dropdown Example</title>
    <!-- icon -->
    
    <link rel="shortcut icon" href="image/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
     body {
        display: flex;
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            height: 100vh; /* 100% of the viewport height */
            margin: 0; /* Remove default margin */
            font-size: 14px;
            border: 2px solid #000; /* Add a border around the body */
            padding: 20px; /* Add padding to create space between the content and the border */

    }
    .Password{
    padding: 20px;
    width: 100%;
            
  }
    form {
    max-width: 50%; /* Set the maximum width of the form */
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
    height: 40px; /* Increase the height of the button */
    color: #fff; /* Set text color to white */
    background-color: #000; /* Set background color to black */
  }
  ion-icon[name="close-outline"] {
        position: absolute; /* Set the position of the close icon to absolute */
        top: 0; /* Position it at the top of the container */
        right: 10px; /* Position it at the left of the container */
        margin: 10px; /* Add some margin for spacing */
        font-size: 24px; /* Adjust the font size of the close icon */
        cursor: pointer; /* Add cursor pointer for interaction */
  } 
  
    </style>

</head>
<body>
<div class="Password">
  <form action="Processing.php" method = "post">
        <h3>ĐỔI MẬT KHẨU</h3>
        <ion-icon name="close-outline"></ion-icon>
    <div class="mb-3">
      <label for="pwd" class="form-label">Mật khẩu cũ:</label>
      <input type="password" name="pass_old" class="form-control"  id="pwd" placeholder="Mật khẩu cũ" >
    </div>
    <div class="mb-3">
      <label for="pwd" class="form-label">Mật khẩu mới:</label>
      <input type="password" name="pass_new" class="form-control"  id="pwd"  placeholder="Mật khẩu mới" >
    </div>
    <button type="submit" name="action" value="change_pass" class="btn btn-primary">Lưu thay đổi</button>
    <button type="submit" name="action" value="hủy đổi mật khẩu" class="btn btn-primary">Hủy</button>
  </form>
</div>
</body>
</html>
    