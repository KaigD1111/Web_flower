<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] === "Xem") {
        $id = $_POST["id"];
        header("Location: info.php?id=$id");
        exit();
    }

    if ($_POST["action"] === "DELETE") {
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
}
?>
