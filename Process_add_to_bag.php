<?php
//include('account.php');
session_start();
// Truy cập giá trị của biến toàn cục $acc
$acc = $_SESSION['acc'];
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_sp = $_POST['id_sp'];
    $sl_sp = $_POST['sl_sp'];
    
    // Lấy giá trị cũ từ cơ sở dữ liệu
    $query = "SELECT gio FROM client WHERE id = '$acc'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $gio_cu = $row['gio'];
        
        // add 
        $gio_moi =$gio_cu."ID_".$id_sp."_SL_".$sl_sp."__//__";
        
        //  UPDATE
        $sql = "UPDATE client SET gio = '$gio_moi' WHERE id = '$acc'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Cập nhật dữ liệu thành công!";
            
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Không tìm thấy dữ liệu cho ID $acc";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}

$conn->close();
header("Location: Giohang.php");
exit();
?>
