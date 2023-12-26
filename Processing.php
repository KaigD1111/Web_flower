<?php
var_dump($_POST);
function findNumberAfterString($inputString, $searchString) {
        // Sử dụng biểu thức chính quy để tìm số đứng sau chuỗi
        $pattern = '/' . preg_quote($searchString, '/') . '(\d+)/';
        preg_match($pattern, $inputString, $matches);
    
        // Trả về số đứng sau chuỗi nếu tìm thấy, ngược lại trả về null
        return isset($matches[1]) ? $matches[1] : null;
    }
// Xem + Delete SP + thêm vào giỏ
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if ($_POST["action"] === "sign") {
    // Thông tin kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flower";

    // Tạo kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Lấy dữ liệu từ biểu mẫu
    $id = $_POST["id"]; // mail
    $name = $_POST["name"];
    //$sex = $_POST["sex"];
    $pass=$_POST["pass"];
    $pass_again=$_POST["pass_again"];


    $sql = "SELECT * FROM client WHERE id = '$id'";
    $result = $conn->query($sql);
    // Kiểm tra kết quả truy vấn
    if ($result->num_rows > 0) {
        // Tên tài khoản đã tồn tại trong bảng "client"
        header("Location: ĐK.php?status=tentkdatontai");
        echo "Tên tài khoản đã tồn tại.";
    } else {
        // Tên tài khoản chưa tồn tại trong bảng "client"
        echo "Tên tài khoản có thể sử dụng.";
    


    if ($pass == $pass_again) {
        
    //echo "gt :".$sex;
    // Câu lệnh SQL để thêm dữ liệu
    $sql = "INSERT INTO client (id, name,pass_word)
    VALUES ('$id', '$name','$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "Dữ liệu đã được thêm thành công";
        header("Location: ĐK.php?status=dangkithanhcong");
    } else {
        echo "Lỗi: " . $conn->error;
    }
    }
    else
    {
        header("Location: ĐK.php?status=MK");
        echo "2 MK không trùng nhau" ;
    }
}

    // Đóng kết nối
    $conn->close();
    }


    if ($_POST["action"] === "Xem" ) { //*********************************************************************************** */
        $id_product = $_POST["id"];
        header("Location: info.php?id=$id_product");
        exit();
    }
    if ($_POST["action"] === "Xem tiếp") { //*********************************************************************************** */
        $id_product = $_POST["id"];
        header("Location: product.php?id=$id_product");
        exit();
    }

    if ($_POST["action"] === "go_change_pass") 
    {
        echo $_POST["action"];
        header("Location: Doimatkhau.php?id=$id");
    }
    if ($_POST["action"] === "go_fix_info") 
    {
        echo $_POST["action"];
        header("Location: fix_info_user.php?id=$id");
    }
    
    if ($_POST["action"] === "hủy đổi mật khẩu") 
    {
        header("Location: Doimatkhau.php?id=$id");
    }

    if ($_POST["action"] === "change_pass") 
    {
            //include('account.php');
            session_start();
            $acc=$_SESSION['acc'];
            if (isset($_POST["pass_old"])) {
                $pass_old = $_POST["pass_old"];
            } else {
                // Xử lý trường hợp "pass_old" không tồn tại
                $pass_old = "123"; // hoặc giá trị mặc định khác tùy thuộc vào logic của bạn
            }
            echo $pass_old ;
            $pass_new = $_POST["pass_new"];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flower";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }

            // Kết nối SQL kiểm tra mật khẩu cũ
            $check_password_query = "SELECT pass_word FROM client WHERE id = '$acc'";
            $result = $conn->query($check_password_query); #thuc hien thoi 

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hashed_password = $row["pass_word"];
                echo "_pass old : ".$hashed_password;
                echo "_pass input : ".$pass_old ;

                // Kiểm tra mật khẩu cũ
                if($hashed_password==$pass_old)
                {
                    $hashed_new_password = password_hash($pass_new, PASSWORD_DEFAULT); # creat pass or new pass
                    
                    $update_password_query = "UPDATE client SET pass_word = '$pass_new' WHERE id = '$acc'";
                    $conn->query($update_password_query);
                    header("Location: login.php?status=doimkthanhcong");
                    echo "Mật khẩu đã được thay đổi thành công!";
                }
                #if (password_verify($pass_old, $hashed_password)) {
                    // Mật khẩu cũ đúng, thực hiện cập nhật mật khẩu mới
                #    $hashed_new_password = password_hash($pass_new, PASSWORD_DEFAULT);
                    
                #    $update_password_query = "UPDATE client SET password = '$hashed_new_password' WHERE id = '$acc'";
                #    $conn->query($update_password_query);

                #    echo "Mật khẩu đã được thay đổi thành công!";
                else {
                    header("Location: Doimatkhau.php?status=saioldpass");
                    echo "Mật khẩu cũ không chính xác.";
                }
            } else {
                echo "Tài khoản không tồn tại.";
            }

            $conn->close();
        }
        if($_POST["action"] === "Hủy cập nhật sản Phẩm")
        {
            header("Location: fix_thongtinsanpham.php?id=$id");
        }

        if ($_POST["action"] === "update infomation product") 
        {
                if (isset($_POST["category"])) {
                    $category = $_POST["category"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    echo "no find actegory";
                }
                if (isset($_POST["name"])) {
                    $name = $_POST["name"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    echo "no find dia chi";
                }
                if (isset($_POST["price"])) {
                    $gia = $_POST["price"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    echo "no find sdt";
                }
                if (isset($_POST["mail"])) {
                    $mail = $_POST["mail"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    echo "no find mail";
                }
                if (isset($_POST["id_product_update"])) {
                    $id = $_POST["id_product_update"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    echo "no id find to update";
                }
                $sl = isset($_POST['sl_in_kho']) ? $_POST['sl_in_kho'] : '';
                $id_kho = isset($_POST['kho']) ? $_POST['kho'] : '';

                $productimage = isset($_POST['product-image']) ? $_POST['product-image'] : '';
                echo $productimage;
            
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
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "flower";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
    
                if ($conn->connect_error) {
                    die("Kết nối không thành công: " . $conn->connect_error);
                }
                $sql = "UPDATE ttsp SET gia='$gia' ,name='$name',category='$category',image='$fileName' WHERE id='$id'";

                if ($conn->query($sql) === TRUE) {
                    echo "Cập nhật thông tin thành công";
                } else {
                    echo "Lỗi cập nhật thông tin: " . $conn->error;
                }
                $sql = "INSERT INTO chitiet_kho (id_of_kho, id_sp, sl_in_kho) 
                VALUES ('$id_kho ', '$id','$sl')";
                
                    if ($conn->query($sql) === TRUE) {
                        echo "Thêm dữ liệu thành công!";
                        header('Location: admin_product.php?status=đã thêm thanh công');
                    } 
                    else {
                        echo "Lỗi: " . $sql . "<br>" . $conn->error;
                    }
            
                $conn->close();
        }

        if ($_POST["action"] === "Cập nhật số lượng")  // cập nhật số lượng
        {
                if (isset($_POST["sl"])) {
                    $sl = $_POST["sl"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    $sl = 0;
                }
                if (isset($_POST["id"])) {
                    $id = $_POST["id"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    $id = 0;
                }


                $id_kho=$_POST["id_kho"];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "flower";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
    
                if ($conn->connect_error) {
                    die("Kết nối không thành công: " . $conn->connect_error);
                }
                $sql = "UPDATE chitiet_kho SET sl_in_kho='$sl' WHERE id_sp='$id' AND id_of_kho='$id_kho'";

                if ($conn->query($sql) === TRUE) {
                    echo "Cập nhật thông tin thành công";
                } else {
                    echo "Lỗi cập nhật thông tin: " . $conn->error;
                }
            
                $conn->close();
        }

        if ($_POST["action"] === "Cập nhật kho")  // cập nhật số lượng
        {
            echo "cập nhật kho";
                if (isset($_POST["name"])) {
                    $name = $_POST["name"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    $name = "";
                }
                if (isset($_POST["id_kho"])) {
                    $id_kho = $_POST["id_kho"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    $id_kho = "";
                }
                if (isset($_POST["address"])) {
                    $address = $_POST["address"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    $address = "";
                }
                if (isset($_POST["status"])) {
                    $state = $_POST["status"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    $state  = "";
                }
                echo  "name :". $name . $address . "ID".$id_kho;
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "flower";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
    
                if ($conn->connect_error) {
                    die("Kết nối không thành công: " . $conn->connect_error);
                }
                $sql = "UPDATE kho SET id_kho='$id_kho' ,name='$name',address_kho='$address' , state='$state'  WHERE  id_kho='$id_kho'";

                if ($conn->query($sql) === TRUE) {
                    echo "Cập nhật kho thành công";
                    header("Location: admin_kho.php");
                } else {
                    echo "Lỗi cập nhật thông tin: " . $conn->error;
                }
            
                $conn->close();
        }


        if ($_POST["action"] === "fix_info_user") 
        {
                //include('account.php');
                session_start();
                $acc=$_SESSION['acc'];
                if (isset($_POST["hoten"])) {
                    $name = $_POST["hoten"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    echo "no find ho ten";
                }
                if (isset($_POST["diachi"])) {
                    $name = $_POST["diachi"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    echo "no find dia chi";
                }
                if (isset($_POST["sdt"])) {
                    $sdt = $_POST["sdt"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    echo "no find sdt";
                }
                if (isset($_POST["mail"])) {
                    $mail = $_POST["mail"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    echo "no find mail";
                }
                if (isset($_POST["diachi"])) {
                    $diachi = $_POST["diachi"];
                } else {
                    // Xử lý trường hợp "pass_old" không tồn tại
                    $mail = "";
                }
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "flower";
    
                $conn = new mysqli($servername, $username, $password, $dbname);
    
                if ($conn->connect_error) {
                    die("Kết nối không thành công: " . $conn->connect_error);
                }
                $sql = "UPDATE client SET name='$name', address='$diachi', phone='$sdt', mail='$mail' WHERE id='$acc'";

                if ($conn->query($sql) === TRUE) {
                    echo "Cập nhật thông tin thành công";
                    header("Location: thongtintaikhoan.php");
                } else {
                    echo "Lỗi cập nhật thông tin: " . $conn->error;
                }
            
                $conn->close();
        }


    if ($_POST["action"] === "delete_product" ) { // * adminmmmmmmmm
        // Your delete logic here
        $product_id = $_POST["id_delete_product"];
        echo $product_id;
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        $sql = "DELETE FROM chitiet_kho WHERE id_sp = '$product_id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted sp in kho successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $sql = "DELETE FROM cart WHERE id_product = '$product_id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted cart  successfully";
           
        } else {
            echo "Error deleting record: " . $conn->error;
        }


        $sql = "DELETE FROM ttsp WHERE id = '$product_id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            header("Location: admin_product.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        // ...
    }
    if ($_POST["action"] === "delete_kho" ) { // * adminmmmmmmmm
        $id_kho=$_POST["id_kho"];
        echo $id_kho;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        $sql = "DELETE FROM `chitiet_kho` WHERE id_of_kho= '$id_kho'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            //header("Location: mess.php");
           
            
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "DELETE FROM `kho` WHERE id_kho= '$id_kho'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            //header("Location: mess.php");
            header('Location: admin_kho.php?status=đã xóa thành công');
            
        } else {
            echo "Error deleting record: " . $conn->error;
        }


        $conn->close();
    }

    if ($_POST["action"] === "delete_user") {
        // Your delete logic here
        $user_id = $_POST["id_user_delete"];
        echo $user_id;
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
    
        // Xóa chi tiết hóa đơn
        $sql_delete_detail_order = "DELETE FROM detail_order WHERE id_order IN (SELECT id FROM `order` WHERE id_cus = '$user_id')";
        if ($conn->query($sql_delete_detail_order) === TRUE) {
            echo "Records in detail_order deleted successfully";
        } else {
            echo "Error deleting records in detail_order: " . $conn->error;
        }
    
        // Xóa hóa đơn
        $sql_delete_orders = "DELETE FROM `order` WHERE id_cus = '$user_id'";
        if ($conn->query($sql_delete_orders) === TRUE) {
            echo "Records in order deleted successfully";
        } else {
            echo "Error deleting records in order: " . $conn->error;
        }
    
        // Xóa dữ liệu từ các bảng khác
        $sql_delete_chat = "DELETE FROM chat WHERE id_acc_send = '$user_id'";
        $sql_delete_cart = "DELETE FROM cart WHERE id_acc = '$user_id'";
        $sql_delete_comment = "DELETE FROM comment WHERE id_cus_comment = '$user_id'";
        $sql_delete_client = "DELETE FROM client WHERE id = '$user_id'";
    
        if ($conn->query($sql_delete_chat) === TRUE &&
            $conn->query($sql_delete_cart) === TRUE &&
            $conn->query($sql_delete_comment) === TRUE &&
            $conn->query($sql_delete_client) === TRUE) {
            echo "Records in chat, cart, comment, and client deleted successfully";
            header("Location: danhsachkhachhang.php");
        } else {
            echo "Error deleting records: " . $conn->error;
        }
    
        // Đóng kết nối
        $conn->close();
    }

    if ($_POST["action"] === "delete_user" ) { // * adminmmmmmmmm
        // Your delete logic here
        $user_id = $_POST["id_user_delete"];
        echo $user_id;
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        $sql = "DELETE FROM detail_order WHERE id_order IN (SELECT id FROM `order` WHERE id_cus = '$user_id')";
        if ($conn->query($sql) === TRUE) {
            echo "Records in detail_order deleted successfully";
        } else {
            echo "Error deleting records in detail_order: " . $conn->error;
        }
        
        $sql_delete_orders = "DELETE FROM detail_order WHERE id_order IN (SELECT id_order FROM `order` WHERE id_cus = '$user_id')";
        $sql = "DELETE FROM order WHERE id_cus = '$user_id'";
        $sql = "DELETE FROM chat WHERE id_acc_send = '$user_id'";
        $sql = "DELETE FROM cart WHERE id_acc = '$user_id'";
        $sql = "DELETE FROM comment WHERE id_cus_comment = '$user_id'";
        $sql = "DELETE FROM client WHERE id = '$user_id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            header("Location: danhsachkhachhang.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        // ...
    }

    if ($_POST["action"] === "delete_order" ) { // * adminmmmmmmmm
        // Your delete logic here
        $id_order = $_POST["id_order_delete"];

        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }

        
        
        $sql = "DELETE FROM detail_order WHERE id_order = '$id_order'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        
        $sql = "DELETE FROM `order` WHERE id = '$id_order'"; // Use backticks around 'order'
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            header("Location: admin_order.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        // ...
    }
    
    if ($_POST["action"] === "Về trang chủ") 
    {
        header("Location: main.php");
    }
    if ($_POST["action"] === "Quay về trang chính") 
    {
        header("Location: danhsachkhachhang.php");
    }
    if ($_POST["action"] === "Đăng xuất") 
    {
        session_start();
        $acc = null;
        $_SESSION['acc'] = $acc; // Set $_SESSION['acc'] to null
    }
    if ($_POST["action"] === "LOGIN") 
    {
            //include('account.php');
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



            $sql = "SELECT id, pass_word,role FROM client WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $tentk);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($db_id, $db_pass,$db_role);
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
                    if ($db_role == "AD") {
                        header("Location: Danhsachkhachhang.php");
                    } else {
                        header("Location: Main.php");
                    }
                    exit();
                } else {
                    
                    echo "Sai mật khẩu";
                    header("Location: login.php?status=sai");
                }
            } else {
                header("Location: login.php?status=sai");
                echo "Không tìm thấy tên đăng nhập trong cơ sở dữ liệu.";
            }

            $stmt->close();
    }

    if ($_POST["action"] === "DELETE_product_cart") //**************************************************************************** */
    { 
        session_start();
        $id_product = $_POST["id"];
        $acc=$_SESSION['acc'];
        echo $id_product ;
        echo "acc :".$acc ;
        // Kết nối đến cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }
        
        // Truy vấn SQL DELETE
        $sql = "DELETE FROM cart WHERE id_product = ? AND id_acc = ?";
        $stmt = $conn->prepare($sql);
        
        // Kiểm tra lỗi truy vấn
        if ($stmt === false) {
            die("Lỗi truy vấn: " . $conn->error);
        }
        
        // Bind các tham số và thực hiện truy vấn
        $stmt->bind_param("ss", $id_product, $acc);
        $stmt->execute();
        
        // Kiểm tra và thông báo kết quả
        if ($stmt->affected_rows > 0) {
            echo "Sản phẩm đã được xóa thành công từ giỏ hàng.";
        } else {
            echo "Không có sản phẩm nào được xóa hoặc có lỗi xảy ra.";
        }
        
        // Đóng kết nối và statement
        $stmt->close();

        header("Location: thanhtoan2.php?status=xoaspkhoigiohangthanhcong");
        exit();
    }


    if ($_POST["action"] === "Xóa giỏ hàng") //**************************************************************************** */
    { 
        session_start();
        
        $acc=$_SESSION['acc'];
        
        // Kết nối đến cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Kết nối không thành công: " . $conn->connect_error);
        }
        
        // Truy vấn SQL DELETE
        $sql = "DELETE FROM cart WHERE id_acc = ?";
        $stmt = $conn->prepare($sql);
        
        // Kiểm tra lỗi truy vấn
        if ($stmt === false) {
            die("Lỗi truy vấn: " . $conn->error);
        }
        
        // Bind các tham số và thực hiện truy vấn
        $stmt->bind_param("s", $acc);
        $stmt->execute();
        
        // Kiểm tra và thông báo kết quả
        if ($stmt->affected_rows > 0) {
            echo "xóa toàn bộ giỏ.";
        } else {
            echo "Không có sản phẩm nào được xóa hoặc có lỗi xảy ra.";
        }
        
        // Đóng kết nối và statement
        $stmt->close();

        header("Location: Giohang.php?id=$id");
        exit();
    }
 
    if ($_POST["action"] === "Mua ngay") {
        $id_product=$_POST['id_sp'];
        $number=$_POST['sl_sp'];
        header("Location: thanhtoanmuangay.php?id_product=$id_product&number=$number");
    }
    if ($_POST["action"] === "Thêm vào giỏ") {
        session_start();
        $acc = $_SESSION['acc'];
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $sl_sp = $_POST['sl_sp'];
        $id_sp = $_POST['id_sp'];
    
        // Check if the product already exists in the cart
        $checkQuery = "SELECT * FROM cart WHERE id_acc = '$acc' AND id_product = '$id_sp'";
        $result = $conn->query($checkQuery);
    
        if ($result->num_rows > 0) {
            // Product already exists in the cart, update the quantity
            $updateQuery = "UPDATE cart SET number_products = number_products + $sl_sp WHERE id_acc = '$acc' AND id_product = '$id_sp'";
            $conn->query($updateQuery);
        } else {
            // Product doesn't exist in the cart, insert a new record
            $insertQuery = "INSERT INTO cart (id_acc, id_product, number_products) VALUES ('$acc', '$id_sp', $sl_sp)";
            $conn->query($insertQuery);
        }
        header("Location: Giohang.php");
        $conn->close();
    }

    if ($_POST["action"] === "comment") {//*******  mua giỏ hang **************************** */
        echo" comment ";
        echo $_POST["comment"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            
        }
        session_start();
        $acc_comment = $_SESSION['acc'];
        $content=$_POST["comment"];
        $id_sp=$_POST["id_sp"];
        		

        $sql = "INSERT INTO `comment` (id_cus_comment, id_product, content_comment) VALUES (?,?, ?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("sss", $acc_comment,  $id_sp, $content);
    
            if ($stmt->execute()) {
                header('Location: info.php');
                header("Location: info.php?id=" . $id_sp);
                echo "Thêm dữ liệu thành công!";
            } else {
                echo "Lỗi: " . $stmt->error;
            }
    
            $stmt->close();
        } else {
            echo "Lỗi: " . $conn->error;
        }
    
    }

    
    if ($_POST["action"] === "Mua giỏ hàng") {
        session_start();
        $acc = $_SESSION['acc'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
    
        // Retrieve form data
        $id = uniqid();
        $id_cus = $_SESSION['acc'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $currentDate = date("Y-m-d");
    
        // Validate form data (you can add more validation as needed)

    

    
        // Thêm vào chi tiết hóa đơn
    
        $sql = "SELECT * FROM cart  where id_acc='$acc'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        
                    $sl = $row['number_products'];
                    $sql = "INSERT INTO `detail_order` (id_order, id_product, number_product) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
    
                    if ($stmt) {
                        $stmt->bind_param("sss", $id, $row["id_product"], $sl);
    
                        if ($stmt->execute()) {
                            echo "Thêm dữ liệu thành công!";
                            header("Location: inhoadon.php?id=$id");
                        } else {
                            echo "Lỗi: " . $stmt->error;
                        }
    
                        $stmt->close();
                    } else {
                        echo "Lỗi: " . $conn->error;
                    }
                
            }
        

        $sql = "INSERT INTO `order` (id, id_cus, name, sdt, gender, address,date) VALUES (?,?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("sssssss", $id, $id_cus, $name, $sdt, $gender, $address,$currentDate);
    
            if ($stmt->execute()) {
                echo "Thêm dữ liệu thành công!";
            } else {
                echo "Lỗi: " . $stmt->error;
            }
    
            $stmt->close();
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
    else{
    header("Location: thanhtoan2.php?status=bankhongcosp");
    }
    
        $conn->close();
    } 
    #else 
    #{
        // Redirect or handle the case when the form is not submitted via POST
        // header('Location: index.php'); // Replace 'index.php' with the appropriate URL
    #    exit();
    #}
    
    if ($_POST["action"] === "Lưu Thông tin mua") 
    {
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
    
            $sql = "INSERT INTO `order` (id,id_cus,name, sdt, gender, address) VALUES (?, ?, ?, ?)";
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
    if ($_POST["action"] === "Hủy thêm sản Phẩm") 
    {
        header('Location: them_moi_san_pham.php');
    }

    if ($_POST["action"] === "ADD New Product") 
    { // thêm sản phầm adminmmmmmmmmmmmmmmmmmmmmmmmm
        echo "them moi";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        // Retrieve form data
        $productName = isset($_POST['product-name']) ? $_POST['product-name'] : '';
        $productPrice = isset($_POST['product-price']) ? $_POST['product-price'] : '';
        $productSize = isset($_POST['product-size']) ? $_POST['product-size'] : '';
        $productQuantity = isset($_POST['product-quantity']) ? $_POST['product-quantity'] : '';
        $productDescription = isset($_POST['product-description']) ? $_POST['product-description'] : '';
        $productimage = isset($_POST['product-image']) ? $_POST['product-image'] : '';
        $productcategory = isset($_POST['category']) ? $_POST['category'] : '';
        $sl = isset($_POST['sl_in_kho']) ? $_POST['sl_in_kho'] : '';
        $id_kho = isset($_POST['kho']) ? $_POST['kho'] : '';
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
    
        if(intval($productPrice)>0 )
        {
                    $id = uniqid();
                    echo $productDescription;
                    $sql = "INSERT INTO ttsp (id, name, gia,mota,image,category) 
                    VALUES ('$id', '$productName','$productPrice', '$productDescription','$fileName','$productcategory')";
                    
                        if ($conn->query($sql) === TRUE) {
                            echo "Thêm dữ liệu thành công!";
                            // header('Location: them_moi_san_pham.php?status=đã thêm thanh công');
                        } 
                        else {
                            echo "Lỗi: " . $sql . "<br>" . $conn->error;
                        }

                    $sql = "INSERT INTO chitiet_kho (id_of_kho, id_sp, sl_in_kho) 
                    VALUES ('$id_kho ', '$id','$sl')";
                    
                        if ($conn->query($sql) === TRUE) {
                            echo "Thêm dữ liệu thành công!";
                            header('Location: them_moi_san_pham.php?status=đã thêm thanh công');
                        } 
                        else {
                            echo "Lỗi: " . $sql . "<br>" . $conn->error;
                        }
        

        }
        else{
            header('Location: them_moi_san_pham.php?status=đã thêm khong thanh công');
        }
    }


    if ($_POST["action"] === "Thêm kho mới") 
    { // thêm sản phầm adminmmmmmmmmmmmmmmmmmmmmmmmm
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        // Retrieve form data
        $status_kho = isset($_POST['status KHO']) ? $_POST['status KHO'] : 'đang hoạt động';
        $address= isset($_POST['address']) ? $_POST['address'] : '';
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $id = uniqid();
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

    $id = uniqid();
    echo $productDescription;
    $sql = "INSERT INTO kho (id_kho, name, address_kho,state) 
    VALUES ('$id', '$name','$address', '$status_kho ')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Thêm dữ liệu thành công!";
            header('Location: taokhohang.php?status=đã thêm kho thành công');
        } 
        else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }

    
    if ($_POST["action"] === "gửi tin nhắn") 
    { // thêm sản phầm adminmmmmmmmmmmmmmmmmmmmmmmmm
           
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flower";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }
            $sql = "SELECT id FROM client WHERE role = 'AD' LIMIT 1";
            $result = $conn->query($sql);
            $id_acc_get = null; // Mặc định giá trị là null

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id_acc_get = $row["id"];
                echo "ID: " . $id_acc_get;
            } else {
                echo "Không có dữ liệu";
            }
            // Retrieve form data
            $message = $_POST['message'];
            $id_acc_send = $_SESSION['acc'];
            
        
            // Validate form data (you can add more validation as needed)
        
            $sql = "INSERT INTO `chat` (id_acc_send, id_acc_get,content) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
        
            if ($stmt) {
                $stmt->bind_param("sss", $id_acc_send, $id_acc_get, $message);
        
                if ($stmt->execute()) {
                    echo "Thêm dữ liệu thành công!";
                    header('Location: contact_us.php?status=guitinthanhcong');
                } else {
                    echo "Lỗi: " . $stmt->error;
                }
        
                $stmt->close();
            } else {
                echo "Lỗi: " . $conn->error;
            }
    } 

    if ($_POST["action"] === "kiểm tra hóa đơn") 
    {
        header('Location: check_hoa_don.php');
    }

    //else {
        // Redirect or handle the case when the form is not submitted via POST
    //    header('Location: index.php'); // Replace 'index.php' with the appropriate URL
    //    exit();
    //}

}
?>
