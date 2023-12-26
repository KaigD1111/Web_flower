
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>In hóa đơn</title>
<style>
    .container{
    width: 35%;
    height: 90vh;
    border: 0px solid black;          
    margin: 30px auto;
    font-size: 16px;
}
.title{
    text-align: center;
    font-weight: bold;
}
#infor-field{
    width: 90%;
    border-collapse: collapse;
    height: 40%;
    margin: 30px auto;
    font-size: 16px;
}
#infor-field  tr{
    height: 20%;
}
#infor-field tr  td{
    width: 50%;
    padding-left: 10px;
}
#price-field{
    width: 70%;
    border-collapse: collapse;
}
#price-field  tr{
    height: 30px;
}
#price-field  tr  td{
    width: 50%;
    text-align: center;
}
.top{
    color:chocolate;
    font-size: 16px;
  }



#infor-field, #price-field {
        border-collapse: collapse;
    }

    #infor-field td, #price-field td {
        border: none;
    }
 </style>
</head>
<body>
    <div class="container">
        <div class="top">
            <div class="logo">
                <h2><span class="danger">Flower Store</span></h2>
            </div>
        </div>

            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "flower";
                $conn_detail = new mysqli($servername, $username, $password, $dbname);
                session_start();    
                $acc=($_SESSION['acc']);
                $query_id_acc = "SELECT id,id_cus FROM `order` WHERE id_cus = '$acc'";
                $result_id_acc = $conn_detail->query($query_id_acc);
                if ( $result_id_acc->num_rows > 0) 
                {
                    while ($row_id_acc = $result_id_acc->fetch_assoc()) 
                    {
                        
                                $id = $row_id_acc['id'];


                                $query = "
                                    SELECT order.id as id_order, ttsp.id as id_product, detail_order.number_product as number_product,
                                        order.id_cus as id_KH, order.name as name_KH, ttsp.name as name_sp, ttsp.gia as gia, ttsp.image as image,
                                        order.sdt as sdt, order.address as address, detail_order.number_product as sl ,order.date as date
                                    FROM detail_order
                                    INNER JOIN `order` ON detail_order.id_order = `order`.id
                                    INNER JOIN ttsp ON detail_order.id_product = ttsp.id
                                    INNER JOIN client ON client.id = order.id_cus 
                                    WHERE order.id='{$id}'";

                                $result_query = $conn_detail->query($query);

                                if ($result_query->num_rows > 0) {
                                    $tongtien = 0;
                                    $productsData = [];

                                    while ($row_query = $result_query->fetch_assoc()) {
                                        //echo '<tr>';
                                        //echo '<td>ID Khách hàng: ' . $row_query['id_KH'] . '</td>';
                                        
                                        //echo '<td>Tên Sản phẩm: ' . $row_query['name_sp'] . '</td>';
                                        //echo '<td>Số lượng: ' . $row_query['sl'] . '</td>';
                                        //echo '</tr>';

                                        $tongtien += intval($row_query['gia']);
                                        $productsData[$row_query['name_sp']] = $row_query['sl'];
                                        $customerInfo['id_KH'] = $row_query['id_KH'];
                                        $customerInfo['name_KH'] = $row_query['name_KH'];
                                        $customerInfo['sdt'] = $row_query['sdt'];
                                        $customerInfo['address'] = $row_query['address'];
                                        $customerInfo['date'] = $row_query['date'];
                                    }
                                    
                                }
                            ?>
                                    <h3 class="title">HÓA ĐƠN MUA HÀNG</h3>
        <table border="0" id="infor-field">
                            <tr>
                                <td>Tên khách hàng:</td>
                                <td id="customer-name"><?php echo $customerInfo['name_KH'] ; ?></td>
                            </tr>
                            <tr>
                                <td>Ngày mua:<?php echo $customerInfo['date'] ; ?></td>
                                <td id="date"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại:</td>
                                <td id="phone"><?php echo $customerInfo['sdt']; ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ:</td>
                                <td id="address"><?php echo $customerInfo['address']; ?></td>
                            </tr>
                            <tr>
                                <td>Sản phẩm:</td>
                                <td id="product">
                                    <?php
                                    foreach ($productsData as $productName => $productsl) {
                                        echo '<p>Tên Sản phẩm: ' . $productName . ', số lượng: ' . $productsl . '</p>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Số lượng:</td>
                                <td id="numberproduct"></td>
                            </tr>
                        </table>
                        <table border="0" id="price-field" align="center">
                            <tr style="font-weight: bold;">
                                <td>Tổng tiền</td>
                                <td id="total-price"><?php echo $tongtien; ?>đ</td>
                            </tr>
                        </table>
                        
                <?php  }
                }?>
    </div>

    <script>
        // Add your JavaScript logic here
        document.getElementById('date').textContent = new Date().toLocaleDateString();
    </script>
</body>
</html>