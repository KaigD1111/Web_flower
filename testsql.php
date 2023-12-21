<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Thực hiện câu truy vấn SQL với INNER JOIN
$query = "
SELECT order.id as id_order,ttsp.id as id_product,detail_order.number_product as number_product 
,order.id_cus as id_KH , ttsp.name as name_sp , ttsp.gia as gia,client.name as name_KH
FROM detail_order
INNER JOIN `order` ON detail_order.id_order = `order`.id
INNER JOIN ttsp ON detail_order.id_product = ttsp.id
INNER JOIN client ON `order`.id_cus = client.id

";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<tr>
            <th>ID Order</th>
            <th>ID Product</th>
            <th>Quantity</th>
            <th>name product</th>
            <th>id KH</th>
            <th>name_KH</th>
         </tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id_order'] . '</td>';
        echo '<td>' . $row['id_product'] . '</td>';
        echo '<td>' . $row['number_product'] . '</td>';
        echo '<td>' . $row['name_sp'] . '</td>';
        echo '<td>' . $row['id_KH'] . '</td>';
        echo '<td>' . $row['name_KH'] . '</td>';
        echo '</tr>';

        // Tính tổng tiền (nếu cần)
       
    }

    echo '</table>';

    // In tổng tiền (nếu cần)
} else {
    echo "Không có dữ liệu";
}

$conn->close();
?>
