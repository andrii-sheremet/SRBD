<?php
include('db.php');

if (isset($_GET['id'])) {
  $dept_id = intval($_GET['id']);

  $query = "SELECT * FROM dbo.GetGoodsInDepartment(".$dept_id.");";
  $stmt = $conn->query($query);
  $goods = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "<h2>Список товарів у відділі ".$dept_id."</h2>";
  echo "<table border='1'>";
  echo "<tr><th>GOOD_ID</th><th>NAME</th><th>PRICE</th><th>QUANTITY</th><th>PRODUCER</th><th>DESCRIPTION</th></tr>";
  foreach ($goods as $good) {
      echo "<tr>
              <td>" . $good['GOOD_ID'] . "</td>
              <td><a href='good.php?id=" . $good['GOOD_ID'] . "'>" . $good['NAME'] . "</a></td>
              <td>" . $good['PRICE'] . "</td>
              <td>" . $good['QUANTITY'] . "</td>
              <td>" . $good['PRODUCER'] . "</td>
              <td>" . $good['DESCRIPTION'] . "</td>
          </tr>";
  }
  echo "</table>";
}
else{
  $query = "SELECT * FROM Goods"; 
  $stmt = $conn->query($query); 
  $goods = $stmt->fetchAll(PDO::FETCH_ASSOC); 
  
  echo "<h2>Список товарів</h2>";
  echo "<table border='1'>";
  echo "<tr><th>GOOD_ID</th><th>NAME</th><th>PRICE</th><th>QUANTITY</th><th>PRODUCER</th><th>DESCRIPTION</th><th>DEPT_ID</th></tr>";
  foreach ($goods as $good) {
      echo "<tr>
              <td>" . $good['GOOD_ID'] . "</td>
              <td><a href='good.php?id=" . $good['GOOD_ID'] . "'>" . $good['NAME'] . "</a></td>
              <td>" . $good['PRICE'] . "</td>
              <td>" . $good['QUANTITY'] . "</td>
              <td>" . $good['PRODUCER'] . "</td>
              <td>" . $good['DESCRIPTION'] . "</td>
              <td>" . $good['DEPT_ID'] . "</td>
            </tr>";
  }
  echo "</table>";
}
?>
