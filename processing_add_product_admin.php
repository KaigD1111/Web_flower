<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $productName = isset($_POST['product-name']) ? $_POST['product-name'] : '';
    $productPrice = isset($_POST['product-price']) ? $_POST['product-price'] : '';
    $productSize = isset($_POST['product-size']) ? $_POST['product-size'] : '';
    $productQuantity = isset($_POST['product-quantity']) ? $_POST['product-quantity'] : '';
    $productDescription = isset($_POST['product-description']) ? $_POST['product-description'] : '';
    $productimage = isset($_POST['product-image']) ? $_POST['product-image'] : '';
    #if(isset($_POST['submit']))
    #{
    #    $image=$_FILES["product-image"]['name'];
    #    echo $image;
    #}

    // Display the received data (for testing purposes)
    echo "<h2>Received Data:</h2>";
    echo "<p><strong>Tên Sản Phẩm:</strong> $productName</p>";
    echo "<p><strong>Giá:</strong> $productPrice</p>";
    echo "<p><strong>Kích thước:</strong> $productSize</p>";
    echo "<p><strong>Số lượng:</strong> $productQuantity</p>";
    echo "<p><strong>Mô tả:</strong> $productDescription</p>";
    echo "<p><strong>Image_path:</strong> $productimage</p>";

    // Handle file upload (if needed)
    if (isset($_FILES['product-image'])) {
        $file = $_FILES['product-image'];
        $fileName = $file['name'];
        //$fileTmpName = $file['tmp_name'];
        echo $fileName;
        // Move the uploaded file to a desired directory
        $uploadDir = 'img/'; // Adjust this directory as needed
        $uploadPath = $uploadDir . $fileName;

        //move_uploaded_file($fileTmpName, $uploadPath);

        echo "<p><strong>Hình ảnh:</strong> $uploadPath</p>";
    } else {
        echo "<p><strong>Hình ảnh:</strong> No image uploaded</p>";
    }

$sql = "INSERT INTO ttsp (id, name, gia,mota) 
VALUES ('$fileName', '$productName','$productPrice', '$productDescription')";

if ($conn->query($sql) === TRUE) {
    echo "Thêm dữ liệu thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}
} else {
    // Redirect or handle the case when the form is not submitted via POST
    header('Location: index.php'); // Replace 'index.php' with the appropriate URL
    exit();
}



?>
