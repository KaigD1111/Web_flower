<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="header.css"> <!-- Đường dẫn tới file CSS -->


    <title>Thêm kho</title>
    <!-- icon -->
    <link rel="shortcut icon" href="image/logo.png">
    <!--<link rel="stylesheet" href="addproductmanagement.css" />-->
    <style>
    input, select, textarea {
    box-sizing: border-box;
    width: 100%;
    height: 40px;
    padding: 8px; /* Adjust the padding as needed */
    margin: 5px 0; /* Adjust the margin as needed */
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
}


input[type="submit"], .Huy {
    background-color: black;
    color: white;
    padding: 8px 12px; /* Adjust the padding to make the buttons smaller */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 70px;
    margin-right: 20px; /* Add some space between buttons */
    font-size: 14px; /* Adjust the font size to make the text smaller */
}
input[type="submit"], .Add {
    background-color: black;
    color: white;
    padding: 8px 12px; /* Adjust the padding to make the buttons smaller */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 90px;
    height: 40px;
    margin-right: 30px; /* Add some space between buttons */
    font-size: 14px; /* Adjust the font size to make the text smaller */
}
.form-control{
    width: 30%;
    frontsize: 10px;
}
body {
    display: flex;
    justify-content: center;
    align-items: center;
   
}

.container {
    width: 70%;
    background-color: #fff; /* Optional: Add a background color for better visibility */
    padding: 20px; /* Optional: Add some padding inside the container */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle box shadow */
}
ion-icon[name="close-outline"] {
        position: absolute; /* Set the position of the close icon to absolute */
        top: 0; /* Position it at the top of the container */
        right: 180px; /* Position it at the left of the container */
        margin: 10px; /* Add some margin for spacing */
        font-size: 24px; /* Adjust the font size of the close icon */
        cursor: pointer; /* Add cursor pointer for interaction */
  } 
  .top{
    color:chocolate;
    font-size: 16px;
  }
  
</style>
</head>
<body>
<div class="container">
  <form action="processing.php" method="post">
  <div class="top">
                <div class="logo">
                    <h2><span class="danger">Flower Store</span></h2>
                </div>
            </div>
    <h3>THÊM MỚi KHO</h3>
  <ion-icon name="close-outline"></ion-icon>
    <div class="row">
      <div class="col-25">
        <label for="name">Tên kho</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Tên kho">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Địa chỉ</label>
      </div>
      <div class="col-75">
        <input type="text" id="address" name="address" placeholder="Địa chỉ">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Tỉnh/TP</label>
      </div>
      <div class="col-75">
        <input type="text" id="address" name="tinh" placeholder="Tỉnh/TP">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="status">Trạng thái</label>
      </div>
      <div class="col-75">
        <select id="status" name="status KHO">
          <option value="Đang hoạt động">Đang hoạt động</option>
          <option value="Ngưng hoạt động">Ngưng hoạt dộng</option>
        </select>
      </div>
    </div>
    <div class="row">
      <input type="submit" class="Add" value="Thêm kho mới" name="action">
      <input type="submit" class= "Huy" value="Hủy" name="action">
    </div>
  </form>
  <form action="admin_kho.php" method="post">
    <input type="submit" class= "back" value="Quay về" name="action">
  </form>
</div>
</body>
</html>