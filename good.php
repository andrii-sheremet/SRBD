<?php
include('db.php');

if (isset($_GET['id'])) {
  $good_id = intval($_GET['id']);

  $query = "
    SELECT g.GOOD_ID, g.NAME AS GOOD_NAME, g.PRICE, g.QUANTITY, g.PRODUCER, g.DESCRIPTION, 
          s.SALE_ID, s.CHECK_NO, s.DATE_SALE, s.QUANTITY AS SALE_QUANTITY
    FROM Goods g
    LEFT JOIN Sales s ON g.GOOD_ID = s.GOOD_ID
    WHERE g.GOOD_ID = :good_id
  ";

  $stmt = $conn->prepare($query);
  $stmt->bindParam(':good_id', $good_id, PDO::PARAM_INT);

  $stmt->execute();

  $good = $stmt->fetch(PDO::FETCH_ASSOC);
  $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<h2>Докладна інформація про товар: " . $good['GOOD_NAME'] . "</h2>";
  echo "<p><strong>Ціна:</strong> " . $good['PRICE'] . " грн</p>";
  echo "<p><strong>Кількість на складі:</strong> " . $good['QUANTITY'] . "</p>";
  echo "<p><strong>Виробник:</strong> " . $good['PRODUCER'] . "</p>";
  echo "<p><strong>Опис:</strong> " . $good['DESCRIPTION'] . "</p>";

  echo "<h3>Продажі цього товару</h3>";
  if (count($sales) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>SALE_ID</th><th>CHECK_NO</th><th>DATE_SALE</th><th>QUANTITY</th></tr>";
    foreach ($sales as $sale) {
        echo "<tr>
                <td>" . $sale['SALE_ID'] . "</td>
                <td>" . $sale['CHECK_NO'] . "</td>
                <td>" . $sale['DATE_SALE'] . "</td>
                <td>" . $sale['SALE_QUANTITY'] . "</td>
              </tr>";
    }
    echo "</table>";
  } else {
    echo "<p>Цей товар ще не був проданий.</p>";
  }
} else {
  echo "<p>ID не передано.</p>";
}
?>
