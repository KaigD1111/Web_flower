<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
<style>
body {
    display: flex;
    align-items: center; 
    justify-content: center;
    flex-direction: column;
    height: 100vh;
    margin: 0;
    background-image: url('https://i.pinimg.com/564x/ea/6e/c7/ea6ec79b3c07054ac66fa8202d0c893e.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image */
    background-size: cover; /* This property ensures that the background image covers the entire container */
    background-position: center; /* This property centers the background image */
    } 
#Login {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(30, 1, 1, 0.938);
    padding: 20px;
    width: 40s0px;
    text-align: center;
}

table {
    width: 100%;
    align-items: center;
}

th, td {
    font-size: larger;
    padding: 10px;
    text-align: left;
    border: none;
}

input[type="text"] {
    width: 90%;
    padding: 8px;
    margin-bottom: 10px;
}

button{
    background: black;
    color: rgb(255, 255, 255);
    padding: 6px 10px;
    border-radius: 10px ;
    cursor: pointer;
    transition: background-color 0.5s ;
    font-weight: bolder;
    margin-top: 5px;
  }

  button:hover{
    background-color: rgb(245, 245, 245);
  }
div{
    background-color: #fff;
}
form {
    width: 400px; /* Đặt kích thước chiều rộng cố định cho form */
    height: 250px;
    max-width: 100%; 
    display: flex; /* Sử dụng mô hình flexbox cho form */
    flex-direction: column; /* Xếp phần tử trong form theo chiều dọc */
    align-items: center; /* Căn giữa theo chiều dọc */
}

    </style>
</head>
<body>
<div>
    <form id="login" action="Processing_login.php" method="POST">
        <h2 align="center">Đăng nhập</h2>
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="ten_tk" required></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="mk" required></td>
            </tr>
        </table>
        
        <button type="submit" name="action" value="LOGIN">Đăng nhập</button>
    </form>
</div>

</body>
</html>