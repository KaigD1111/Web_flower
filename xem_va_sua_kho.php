<?php //var_dump($_POST); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="header.css"> <!-- Đường dẫn tới file CSS -->


    <title>Sửa thông tin kho</title>
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
<?php
// Include your database connection file or establish a connection here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if action is set and equals "update_info_product"
    if (isset($_POST["action"]) && $_POST["action"] == "fix_kho") {
        // Retrieve the id_delete_product from the form
        $id_kho = $_POST["id_kho"];

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
        $sql = "SELECT id_kho, name, address_kho,state FROM kho WHERE id_kho = '$id_kho'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch the product information
            $row = $result->fetch_assoc();

            // Now you have the product information in the $row variable
            // You can use it to pre-fill your update form or perform other actions

            // For example, to pre-fill a form for updating, you can do something like this:
            $id_kho=$row["id_kho"];
            $name = $row["name"];
            $address = $row["address_kho"];
            $state_kho = $row["state"];
            // Close the database connection
            $conn->close();
        } else {
            echo "kho not found!";
        }
    } else {
        echo "Invalid action!";
    }
}
?>
<div class="container">
  <form action="processing.php" method="post">
  <div class="top">
                <div class="logo">
                    <h2><span class="danger">Flower Store</span></h2>
                </div>
            </div>
    <h3>SỬA THÔNG TIN KHO</h3>
  <ion-icon name="close-outline"></ion-icon>
  <div class="row">
      <div class="col-25">
        <label for="name">ID kho <?php echo $id_kho ?></label>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="name">Tên kho</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="<?php echo  $name ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Địa chỉ</label>
      </div>
      <div class="col-75">
        <input type="text" id="address" name="address" placeholder="<?php echo  $address ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Tỉnh/TP</label>
      </div>
      <div class="col-75">
        <input type="text" id="address" name="firstaddress" placeholder="Tỉnh/TP">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="status">Trạng thái</label>
      </div>
      <div class="col-75">
        <select id="status" name="status">
          <option value="Đang hoạt động">Đang hoạt động</option>
          <option value="Ngưng hoạt động">Ngưng hoạt dộng</option>
        </select>
      </div>
    </div>
    <div class="row">

      <input type="hidden" name="id_kho" value=<?php echo $id_kho ?>>
      <input type="submit" class="Add" value="Cập nhật kho" name="action">
      
    </div>
  </form>
  <form action="admin_kho.php" method="post">
    <input type="submit" class= "Huy" value="Hủy">
</fom>
  <h3>Danh sách sản phẩm trong kho</h3>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$id_of_kho="658849ced3d2e";

$sql_chitietkho = "SELECT id_sp, sl_in_kho,id_of_kho FROM chitiet_kho WHERE id_of_kho = '$id_kho'";
$result_chitietkho = $conn->query($sql_chitietkho);

// Check if any rows were returned
//if ($result_chitietkho->num_rows > 0) {
    // Step 2: Iterate through ttsp
    $sql_ttsp = "SELECT id,name,image FROM ttsp";
    $result_ttsp = $conn->query($sql_ttsp);

    // Check if any rows were returned
    if ($result_ttsp->num_rows > 0) {
        // Fetch rows from chi_tiet_kho and store in associative array
        $chitietkho_data = [];
        while ($row_chitietkho = $result_chitietkho->fetch_assoc()) {
            $chitietkho_data[$row_chitietkho['id_sp']] = $row_chitietkho['sl_in_kho'];
        }

        // Iterate through ttsp
        while ($row_ttsp = $result_ttsp->fetch_assoc()) {
            $id_ttsp = $row_ttsp['id'];

            // Check if id_ttsp is present in chi_tiet_kho_data
            if (array_key_exists($id_ttsp, $chitietkho_data)) {
              ?>
              <tr>
              <form action="Processing.php" method="POST">
              <td>
              <img width='100' src='img/<?php echo  $row_ttsp["image"]; ?>' alt='Mô tả hình ảnh'>
              </td>
              <td><?php echo  "Tên sản phẩm: " .$row_ttsp["name"]; ?></td><br>
              <td><?php echo  "ID " .$row_ttsp["id"]; ?></td>
              <div>
                <input type="hidden" name="id" value=<?php echo $row_ttsp["id"]; ?>>
                <input type="hidden" name="id_kho" value=<?php echo $id_kho ?>>
                <input type="text" id="name" name="sl" placeholder="<?php echo "số lượng hiện tại ". $chitietkho_data[$id_ttsp]; ?>">
                <input type="submit" class="Add" value="Cập nhật số lượng" name="action">
              </div>
              
              </form>
              </tr>
              <?php
              
            } else {
              ?>
              <tr>
              <form action="Processing.php" method="POST">
              <td>
              <img width='100' src='img/<?php echo  $row_ttsp["image"]; ?>' alt='Mô tả hình ảnh'>
              </td>
              <td><?php echo  "Tên sản phẩm: " .$row_ttsp["name"]; ?></td><br>
              <td><?php echo  "ID " .$row_ttsp["id"]; ?></td>
              <div class="col-75">
                <input type="hidden" name="id" value=<?php echo $row_ttsp["id"]; ?>>
                <input type="hidden" name="id_kho" value=<?php echo $id_kho ?>>
                <input type="text" id="name" name="sl" placeholder="<?php echo "số lượng hiện tại : 0" ; ?>">
                <input type="submit" class="Add" value="Cập nhật số lượng" name="action">
              </div>
              
              </form>
              </tr>
              <?php
            }

            // Print the result
            // echo "ID: $id_ttsp, Quantity: $quantity<br>";
        }
    } else {
        echo "No rows found in ttsp.";
    }
//} else {
//    echo "không có sản phẩm trong chi tiết kho.";
//}

// Close connection
$conn->close();
?>

</div>
</body>
</html>