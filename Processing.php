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
    if ($_POST["action"] === "Xem") { //*********************************************************************************** */
        $id_product = $_POST["id"];
        header("Location: info.php?id=$id_product");
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

                    echo "Mật khẩu đã được thay đổi thành công!";
                }
                #if (password_verify($pass_old, $hashed_password)) {
                    // Mật khẩu cũ đúng, thực hiện cập nhật mật khẩu mới
                #    $hashed_new_password = password_hash($pass_new, PASSWORD_DEFAULT);
                    
                #    $update_password_query = "UPDATE client SET password = '$hashed_new_password' WHERE id = '$acc'";
                #    $conn->query($update_password_query);

                #    echo "Mật khẩu đã được thay đổi thành công!";
                else {
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
        $sql = "DELETE FROM ttsp WHERE id = '$product_id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            header("Location: admin_product.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        // ...
    }
    if ($_POST["action"] === "delete_chat" ) { // * adminmmmmmmmm
        $acc_send = $_POST["id_acc_send"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        $sql = "DELETE FROM `chat` WHERE id_acc_send = '$acc_send'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }
    if ($_POST["action"] === "delete_order" ) { // * adminmmmmmmmm
        echo "delete_order";
        $order_id = $_POST["id_order_delete"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flower";
        echo $order_id ;
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        $sql = "DELETE FROM `order` WHERE id = '$order_id'";
        if ($conn->query($sql) === TRUE) {
            $sql = "DELETE FROM detail_order WHERE id_order = '$order_id'";
            echo "Record deleted successfully";
            header("Location: admin_order.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
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
        $sql = "DELETE FROM client WHERE id = '$user_id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            header("Location: danhsachkhachhang.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        // ...
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
                }
            } else {
                echo "Không tìm thấy tên đăng nhập trong cơ sở dữ liệu.";
            }

            $stmt->close();
    }

    if ($_POST["action"] === "DELETE_product_cart") //**************************************************************************** */
    { 
        session_start();
        $id_product = $_POST["id"];
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

        header("Location: Giohang.php?id=$id");
        exit();
    }

    if ($_POST["action"] === "Xóa giỏ hàng") //**************************************************************************** */
    { 
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
            $gioMoi = str_replace($gioHienTai,'', $gioHienTai);

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
    
        $conn->close();
    }

    if ($_POST["action"] === "Thêm vào giỏ này cu roi hong sai nua ") {//*******  mua giỏ hang **************************** */
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
        $sl_sp = $_POST['sl_sp'];
        $id_sp = $_POST['id_sp'];
        $query = "SELECT product FROM giohang WHERE id = '$acc'";
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
    
        // Validate form data (you can add more validation as needed)
    
        $sql = "INSERT INTO `order` (id, id_cus, name, sdt, gender, address) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("ssssss", $id, $id_cus, $name, $sdt, $gender, $address);
    
            if ($stmt->execute()) {
                echo "Thêm dữ liệu thành công!";
            } else {
                echo "Lỗi: " . $stmt->error;
            }
    
            $stmt->close();
        } else {
            echo "Lỗi: " . $conn->error;
        }
    
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
                        } else {
                            echo "Lỗi: " . $stmt->error;
                        }
    
                        $stmt->close();
                    } else {
                        echo "Lỗi: " . $conn->error;
                    }
                
            }
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
        header('Location: addproductmanagerment.php');
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
    $id = uniqid();
    $sql = "INSERT INTO ttsp (id, name, gia,mota,image) 
    VALUES ('$id', '$productName','$productPrice', '$productDescription','$fileName')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Thêm dữ liệu thành công!";
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
                } else {
                    echo "Lỗi: " . $stmt->error;
                }
        
                $stmt->close();
            } else {
                echo "Lỗi: " . $conn->error;
            }
    } 

    //else {
        // Redirect or handle the case when the form is not submitted via POST
    //    header('Location: index.php'); // Replace 'index.php' with the appropriate URL
    //    exit();
    //}

}
?>
