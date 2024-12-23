<?php
include('db.php');

$query = "SELECT * FROM Sales";
$stmt = $conn->query($query);
$sales = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Список продажів</h2>";
echo "<table border='1'>";
echo "<tr><th>SALE_ID</th><th>CHECK_NO</th><th>GOOD_ID</th><th>DATE_SALE</th><th>QUANTITY</th></tr>";
foreach ($sales as $sale) {
    echo "<tr>
            <td>" . $sale['SALE_ID'] . "</td>
            <td>" . $sale['CHECK_NO'] . "</td>
            <td>" . $sale['GOOD_ID'] . "</td>
            <td>" . $sale['DATE_SALE'] . "</td>
            <td>" . $sale['QUANTITY'] . "</td>
          </tr>";
}
echo "</table>";
echo "<a href='add_sale.php'>Створити</a>";
?>
