<?php
include('db.php');

$query = "SELECT * FROM Workers";
$stmt = $conn->query($query);
$workers = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Список працівників</h2>";
echo "<table border='1'>";
echo "<tr><th>WORKERS_ID</th><th>NAME</th><th>ADDRESS</th><th>DEPT_ID</th><th>INFORMATION</th></tr>";
foreach ($workers as $worker) {
    echo "<tr>
            <td>" . $worker['WORKERS_ID'] . "</td>
            <td>" . $worker['NAME'] . "</td>
            <td>" . $worker['ADDRESS'] . "</td>
            <td>" . $worker['DEPT_ID'] . "</td>
            <td>" . $worker['INFORMATION'] . "</td>
          </tr>";
}
echo "</table>";
?>
