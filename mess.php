<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<style>
    :root {
    --clr-primary: #7380ec;
    --clr-danger: #ff7782;
    --clr-success: #41f1b6;
    --clr-white: #fff;
    --clr-info-dark: #7d8da1;
    --clr-info-light: #dce1eb;
    --clr-dark: #363949;
    --clr-warnig: #ff4edc;
    --clr-light: rgba(132, 139, 200, 0.18);
    --clr-primary-variant: #111e88;
    --clr-dark-variant: #677483;
    --clr-color-background: #f6f6f9;
    --card-border-radius: 2rem;
    --border-radius-1: 0.4rem;
    --border-radius-2: 0.8rem;
    --border-radius-3: 1.2rem;
    --card-padding: 1.8rem;
    --padding-1: 1.2rem;
    --box-shadow: 0 2rem 3rem var(--clr-light);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    border: 0;
    list-style: none;
    appearance: none;
}

body {
    width: 100vw;
    height: 100vh;
    font-size: 0.88rem;
    user-select: none;
    overflow-x: hidden;
    background: var(--clr-color-background);
}

.container {
    display: grid;
    width: 96%;
    gap: 1.8rem;
    grid-template-columns: 14rem auto 14rem;
    margin: 0 auto;
}

a {
    color: var(--clr-dark)
}

h1 {
    font-weight: 800;
    font-size: 1.8rem;
}

h2 {
    font-size: 1.4rem;
}

h3 {
    font-size: 0.87rem;
}

h4 {
    font-size: 0.8;
}

h5 {
    font-size: 0.77rem;
}

small {
    font-size: 0.75rem;
}

.profile-photo img {
    width: 2.8rem;
    height: 2.8rem;
    border-radius: 50%;
    overflow: hidden;
}

.text-muted {
    color: var(--clr-info-dark);
}

p {
    color: var(--clr-dark-variant);
}

b {
    color: var(--clr-dark);
}

.primary {
    color: var(--clr-primary);
}

.success {
    color: var(--clr-success);
}

.danger {
    color: var(--clr-danger);
}

.warning {
    color: var(--clr-warnig);
}


/* aside*/

aside {
    height: 100vh;
}

aside .top {
    background-color: var(--clr-white);
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 1.4rem;
}

aside .logo {
    display: flex;
    gap: 1rem;
}

aside .top div.close {
    display: none;
}


/* 
    side bar
    */

aside .sidebar {
    background-color: var(--clr-white);
    display: flex;
    flex-direction: column;
    height: 85vh;
    position: relative;
    top: 1rem;
}

aside h3 {
    font-weight: 400;
}

aside .sidebar a {
    display: flex;
    color: var(--clr-info-dark);
    margin-left: 2rem;
    gap: 1rem;
    align-items: center;
    height: 3.2rem;
    transition: all .1s ease-in;
}

aside .sidebar a span {
    font-size: 1.6rem;
    transition: all .1s ease-in;
}

aside .sidebar a:last-child {
    position: absolute;
    bottom: 1rem;
    width: 100%;
}

aside .sidebar a.active {
    background: var(--clr-light);
    color: var(--clr-primary);
    margin-left: 0;
    /*   border-left: 5px solid var(--clr-primary);*/
}

aside .sidebar a.active::before {
    content: '';
    width: 6px;
    height: 100%;
    background-color: var(--clr-primary);
}

aside .sidebar a:hover {
    color: var(--clr-primary);
}

aside .sidebar a:hover span {
    margin-left: 1rem;
    transition: .4s ease;
}

aside .sidebar a span.msg_count {
    background: var(--clr-danger);
    color: var(--clr-white);
    padding: 2px 5px;
    font-size: 11px;
    border-radius: var(--border-radius-1);
}


/*
            main section style
    */

main {
    margin-top: 1.4rem;
    width: auto;
}

main input {
    background-color: transparent;
    border: 0;
    outline: 0;
    color: var(--clr-dark);
}

main .date {
    display: inline-block;
    background-color: var(--clr-white);
    border-radius: var(--border-radius-1);
    margin-top: 1rem;
    padding: 0.5rem 1.6rem;
}

main .insights {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.6rem;
}

main .insights>div {
    background-color: var(--clr-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    margin-top: 1rem;
    box-shadow: var(--box-shadow);
    transition: all .3s ease;
}

main .insights>div:hover {
    box-shadow: none;
}

main .insights>div span {
    background: coral;
    padding: 0.5rem;
    border-radius: 50%;
    color: var(--clr-white);
    font-size: 2rem;
}

main .insights>div.expenses span {
    background: var(--clr-danger);
}

main .insights>div.income span {
    background: var(--clr-success);
}

main .insights>div .middle {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

main .insights>div.middle h1 {
    font-size: 1.6rem;
}

main h1 {
    color: var(--clr-dark);
}

main .insights h1 {
    color: var(--clr-dark);
}

main .insights h3 {
    color: var(--clr-dark);
}

main .insights p {
    color: var(--clr-dark);
}

main .insights .progress {
    position: relative;
    height: 68px;
    width: 68px;
    border-radius: 50px;
}

main .insights svg {
    height: 150px;
    height: 150px;
    position: absolute;
    top: 0;
}

main .insights svg circle {
    fill: none;
    stroke: var(--clr-primary);
    transform: rotate(270, 80, 80);
    stroke-width: 5;
}

main .insights .sale svg circle {
    stroke-dashoffset: 10;
    stroke-dasharray: 150;
}

main .insights .expenses svg circle {
    stroke-dashoffset: 0;
    stroke-dasharray: 150;
}

main .insights .income svg circle {
    stroke: var(--clr-success);
}

main .insights .progress .number {
    position: absolute;
    top: 5%;
    left: 5%;
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

main .recent_order {
    margin-top: 2rem;
}

main .recent_order h2 {
    color: var(--clr-dark);
}

main .recent_order table {
    background-color: var(--clr-white);
    width: 120%;
    border-radius: var(--card-border-radius);
    padding: var(--card-padding);
    text-align: center;
    box-shadow: var(--box-shadow);
    transition: all .3s ease;
    color: var(--clr-dark);
}

main .recent_order table:hover {
    box-shadow: none;
}

main table tbody tr {
    height: 3.8rem;
    border-bottom: 1px solid var(--clr-white);
    color: var(--clr-dark-variant);
}

main table tbody td {
    height: 3.8rem;
    border-bottom: 1px solid var(--clr-dark);
}

main table tbody tr:last-child td {
    border: none;
}

main .recent_order a {
    text-align: center;
    display: block;
    margin: 1rem;
}


/* start right side style
        */

.right {
    margin-top: 1.8rem;
    margin-left: 6rem;
    width: fit-content;
    height: fit-content;
}

.right h2 {
    color: var(--clr-dark);
}

.right .top {
    display: flex;
    justify-content: start;
    gap: 2rem;
}

.right .top button {
    display: none;
}

.right .top .profile {
    display: flex;
    gap: 2rem;
    text-align: center;
}

.right .info h3 {
    color: var(--clr-dark);
}

.right .item h3 {
    color: var(--clr-dark);
}

.button {
    background-color: #04AA6D;
    /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
}

.edit_button {
    background-color: rgb(247, 247, 247);
    color: black;
    border-radius: 4px;
}

.delete_button {
    background-color: rgb(208, 95, 95);
    color: white;
    border-radius: 4px;
}
.hidden {
    display: none;
}
    </style>
<body>
    <div class="container">
        <!-- aside section start-->
        <aside>
            <div class="top">
                <div class="logo">
                    <h2><span class="danger">Flower Store</span></h2>
                </div>
                <div class="close">
                    <span class="material-symbols-outlined">close </span>
                </div>
            </div>
            <!--end top-->
            <div class="sidebar">
                <a href="#">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="Danhsachkhachhang.php" >
                    <span class="material-symbols-outlined">person_outline</span>
                    <h3>Khách hàng</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">insights</span>
                    <h3>Phân tích</h3>
                </a>
                <a href="mess.php" class="active">
                    <span class="material-symbols-outlined">mail_outline</span>
                    <h3>Tin nhắn</h3>
                </a>
                <a href="admin_product.php" class="">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <h3>Sản phẩm</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">report_gmailerrorred</span>
                    <h3>Thống kê</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">Settings</span>
                    <h3>Cài đặt</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">add</span>
                    <h3>Thêm sản phẩm</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Đăng xuất</h3>
                </a>
            </div>
        </aside>

        <main>

            <!--start recent order-->
            <div class="recent_order">
                <h1>Danh sách Khách hàng</h1>
                <table>
                    <thead>
                        <tr>
                            <th>STT </th>
                            <th>id khach hang </th>
                            <th></th>
                            <th>Action </th>
                            <th>trả lời </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $rowCount = 1; // Biến đếm dòng
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "flower";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                        }

                        $sql = "SELECT DISTINCT id_acc_send FROM chat";
                        
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) 
                        {

                            while ($row = $result->fetch_assoc()) 
                            {
                            ?>
                            <tr>

                                <td><?php echo $rowCount ?></td>
                                <td> 
                                <form action="processing.php" method="post">
                                    <input type="hidden" name="id_acc_send" value="<?php echo $row['id_acc_send']; ?>">
                                    <button type="submit" name="action" value="delete_chat" class="button delete_button" onclick="return confirm('Are you sure you want to delete this other?')">deletemn </button>
                                </form>
                                </td>
                                <td><?php echo $row['id_acc_send'] ?></td>
                                <td><form id="searchForm" action="#" method="get" class="right-col flex "></td>

                                <td><input class="form-control me-2" type="text" id="searchInput" name="keyword" placeholder="e bà xieeng " value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>"></td>
                                <i class="fa-solid fa-magnifying-glass fa-2x" style="color: white"></i>
                                <td>
                                    <button class="button" onclick="showMessagesForm(<?php echo strval($row['id_acc_send']) ?>)">Xem tin nhắn</button>
                                </td>
                                <td>
                                <div id="messagesForm<?php echo strval($row['id_acc_send']) ?>" class="hidden">
                                    <h2>Form Xem tin nhắn</h2>
                                    <?php
                                    $sql_mess = "SELECT content FROM chat where id_acc_send='{$row['id_acc_send']}'";
                                    $result_mess = $conn->query($sql_mess);

                                    if ($result_mess->num_rows > 0) 
                                    {

                                        while ($row_mess = $result_mess->fetch_assoc()) 
                                        {
                                            echo $row_mess['content'];

                                        }
                                    }
                                    ?>
                                    <?php echo $row['id_acc_send'] ?>
                                        
                                    <!-- Add your form elements for viewing messages here -->
                                </div>
                                </td>

                            </tr>
                            <?php $rowCount=$rowCount+1?>

                        <?php }} ?>
 
                    </tbody>
                </table>
            </div>

<script>
        function showMessagesForm(row) {
            row = row.toString(); 
            alert("Xem tin nhắn button clicked!" + row);
            var messagesForm = document.querySelector('#messagesForm'+row);
            messagesForm.classList.toggle('hidden');
        }
    </script>

            <!--end recent order-->
        </main>
        <!--main section end-->

        <!--right section start-->
        <div class="right">
            <div class="top">
                <button id="menu_bar">
                    <span class="material-symbols-outlined"><menu></menu></span>
                </button>
                <div class="profile">
                    <div class="info">
                        <p><b>Juliet</b></p>
                        <p>Admin</p>
                        <small class="text-muted"></small>
                    </div>
                    <div class="profile-photo">
                        <img src="C:\xampp\htdocs\Project\Web_flower\img\002.jpg" alt="">
                    </div>
                </div>
            </div>
            <!--end top-->
        </div>
        <!--end right section-->
    </div>
</body>

</html>