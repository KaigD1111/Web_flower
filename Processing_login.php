<?php
include('account.php');
echo $acc;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] === "LOGIN") {
        $tentk = $_POST["ten_tk"];
        $pass = $_POST["mk"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }

        $sql = "SELECT id, pass_word FROM client WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $tentk);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_id, $db_pass);
            $stmt->fetch();
            echo $pass;
            echo $db_pass;
            if($pass==$db_pass)
            {
                echo "dr ma";
            }
            #if (password_verify($pass, $db_pass)) {
            if($pass==$db_pass){
                echo "Đăng nhập thành công";
                $acc = $db_id;
                session_start(); # phiên siêu toàn cục 
                $_SESSION['acc'] = $acc;
                header("Location: Main.php");
                exit();
            } else {
                
                echo "Sai mật khẩu";
            }
        } else {
            echo "Không tìm thấy tên đăng nhập trong cơ sở dữ liệu.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
