<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <title>Sửa thông tin sản phẩm</title>
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
    margin: 0;
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
        right: 220px; /* Position it at the left of the container */
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
<?php
// Include your database connection file or establish a connection here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if action is set and equals "update_info_product"
    if (isset($_POST["action"]) && $_POST["action"] == "update_info_product") {
        // Retrieve the id_delete_product from the form
        $id_fix_product = $_POST["id_fix_product"];

        // Perform database query to fetch product information based on the id
        // Replace the following with your actual database connection and query logic
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        // Assuming your table is named 'products', adjust it accordingly
        $sql = "SELECT id, name, gia,mota,category,image FROM ttsp WHERE id = '$id_fix_product'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the product information
            $row = $result->fetch_assoc();

            // Now you have the product information in the $row variable
            // You can use it to pre-fill your update form or perform other actions

            // For example, to pre-fill a form for updating, you can do something like this:
            $id=$row["id"];
            $name = $row["name"];
            $gia = $row["gia"];
            $mota = $row["mota"];
            $category = $row["category"];
            $image = $row["image"];
            // ... repeat for other fields

            // Close the database connection
            $conn->close();
        } else {
            echo "Product not found!";
        }
    } else {
        echo "Invalid action!";
    }
}
?>

<div class="container">
  <form action="processing.php" method = "post" enctype="multipart/form-data">
  <div class="top">
                <div class="logo">
                    <h2><span class="danger">Flower Store</span></h2>
                </div>
            </div>
    <h3>CẬP NHẬT THÔNG TIN SẢN PHẨM</h3>
  <ion-icon name="close-outline"></ion-icon>
  <script>
  // Add an event listener to the ion-icon for the close button
  document.getElementById('closeIcon').addEventListener('click', function() {
    // Perform any actions you want before closing the page (if needed)
    // Close the page
    window.close();
  });
</script>
<script>
    // Get the input element for price
    var priceInput = document.getElementById('lname');

    // Get the update button element
    var updateButton = document.querySelector('button[name="action"][value="update infomation product"]');

    // Add an input event listener to the price input
    priceInput.addEventListener('input', function () {
        // Check if the price is greater than 0
        if (parseFloat(priceInput.value) > 0) {
            // Enable the update button
            updateButton.disabled = false;
        } else {
            // Disable the update button
            updateButton.disabled = true;
        }
    });
</script>
    <div class="row">
      <div class="col-25">
        <label for="fname">Tên Sản Phẩm</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="name" value="<?php echo $name ?>" placeholder=<?php echo $name ?>>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Giá</label>
      </div>
      <div class="col-75">
        <input type="number" id="lname" name="price"   value="<?php echo $gia ?>" placeholder=<?php echo $gia ?>>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="lname">Hình ảnh</label>
      </div>
      <div class="col-75">
      <input type="file" id="product-name" name="product-image" class="form-control">
                            <div class="image-box"></div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="Kích thước">Kích thước</label>
      </div>
      <div class="col-75">
        <select id="country" name="font-size">
          <option value="Vừa">Vừa</option>
          <option value="Nhỏ">Nhỏ</option>
          <option value="Lớn">Lớn</option>
        </select>
        
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Danh mục sản phẩm">Danh mục sản phẩm</label>
      </div>
      <div class="col-75">

        <input type="text" id="fname" name="category" value="<?php echo $category ?>" placeholder="<?php echo $category ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Danh mục sản phẩm">Thêm vào kho</label>
      </div>
      <div class="col-75">
            <select id="product" name="kho">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flower";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM kho";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $id_kho=$row['id_kho'];
                    ?>
                    <option value="<?php echo $row['id_kho']; ?>">
                        <?php echo $row['id_kho']; ?>
                    </option>
                    <?php
                }
            }
            ?>
        </select>
          <div class="row">
          <div class="col-25">
            <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        // Assuming your table is named 'products', adjust it accordingly
        $sql = "SELECT sl_in_kho FROM chitiet_kho WHERE id_of_kho = '$id_kho'";
        $result = $conn->query($sql);
      
        if ($result->num_rows > 0) {
            // Fetch the product information
           
            while ($row = $result->fetch_assoc()) 
            {
            $sl=$row['sl_in_kho'];
            }
            
        }
        $conn->close();
            ?>
            <label for="fname">Số lượng trong kho</label>
          </div>
          <div class="col-75">
            <input type="text" id="fname" name="sl_in_kho" placeholder="<?php echo "" ?>">
          </div>
        </div>
    <div class="row">
      <div class="col-25">
        <label for="Mô tả">Mô tả</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" value="<?php echo $mota ?>" placeholder="Viết gì đó..." style="height:200px"></textarea>
      </div>
    </div>
    
    <div class="row">
      <input type="hidden"  value='<?php echo $id?>' name="id_product_update">
      <button type="submit" class="Add" value="update infomation product" name="action">Cập nhật</button>
     <button type="submit" class= "Huy" data-real-value="Hủy" value="Hủy cập nhật sản Phẩm" name="action">Hủy</button>
    </div>
  </form>
</div>
</body>
</html>