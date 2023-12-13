<?php
// Xem + Delete SP + thêm vào giỏ
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if ($_POST["action"] === "Xem") { //*********************************************************************************** */
        $id = $_POST["id"];
        header("Location: info.php?id=$id");
        exit();
    }

    if ($_POST["action"] === "DELETE") { //**************************************************************************** */
        $id = $_POST["id"];
        $acc=$_POST["acc"];

        // Kết nối đến cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        // Lấy giá trị hiện tại của trường 'gio'
        $sql = "SELECT gio FROM client WHERE id = '$acc'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $gioHienTai = $row['gio'];

            // Xóa chuỗi con ($id) khỏi chuỗi lớn ($gioHienTai)
            $gioMoi = str_replace($id, '', $gioHienTai);

            // Cập nhật giá trị mới vào cơ sở dữ liệu
            $sqlUpdate = "UPDATE client SET gio = '$gioMoi' WHERE id = '$acc'";

            if ($conn->query($sqlUpdate) === TRUE) {
                echo "Giá trị cột 'gio' đã được cập nhật thành công.";
            } else {
                echo "Lỗi cập nhật cơ sở dữ liệu: " . $conn->error;
            }
        } else {
            echo "Không tìm thấy id = $id trong cơ sở dữ liệu.";
        }

        $conn->close();

        header("Location: Giohang.php?id=$id");
        exit();
    }
    if ($_POST["action"] === "Thêm vào giỏ") {//********************************************************* */
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
    }
    if ($_POST["action"] === "Mua giỏ hàng") {
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
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
            $address = isset($_POST['address']) ? $_POST['address'] : '';
    
            // Validate form data (you can add more validation as needed)
    
            $sql = "INSERT INTO `order` (name, sdt, gender, address) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
    
            if ($stmt) {
                $stmt->bind_param("ssss", $name, $sdt, $gender, $address);
    
                if ($stmt->execute()) {
                    echo "Thêm dữ liệu thành công!";
                } else {
                    echo "Lỗi: " . $stmt->error;
                }
    
                $stmt->close();
            } else {
                echo "Lỗi: " . $conn->error;
            }
        } else {
            // Redirect or handle the case when the form is not submitted via POST
            // header('Location: index.php'); // Replace 'index.php' with the appropriate URL
            exit();
        }
    }


}
?>
