<?php
include('db.php');

function countGoodsInDepartment($dept_id, $conn){
  $query = "SELECT dbo.CountGoodsInDepartment(".$dept_id.") as GoodsCount";
  $stmt = $conn->query($query);
  return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['GoodsCount'];
}
$query = "SELECT * FROM Departments"; 
$stmt = $conn->query($query); 
$departments = $stmt->fetchAll(PDO::FETCH_ASSOC); 

echo "<h2>Список департаментів</h2>";
echo "<table border='1'>";
echo "<tr><th>DEPT_ID</th><th>NAME</th><th>INFO</th><th>Підрахунок кількості товарів</th><th>Отримання списку товарів</th></tr>";
foreach ($departments as $department) {
    echo "<tr>
            <td>" . $department['DEPT_ID'] . "</td>
            <td>" . $department['NAME'] . "</td>
            <td>" . $department['INFO'] . "</td>
            <td><button onclick=\"alert(".
            countGoodsInDepartment($department['DEPT_ID'], $conn)
            .")\">Button</button></td>
            <td>
            <a href=\"goods.php?id=".$department['DEPT_ID']."\">Деталі</a>
            </td>
          </tr>";
}
echo "</table>";
echo "<a href='add_dept.php'>Створити</a>";
?>