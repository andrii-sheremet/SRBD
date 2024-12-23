<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати департамент</title>
</head>
<body>
    <h2>Додати новий департамент</h2>
    <form action="add_dept.php" method="POST">
        <label for="dept_id">ID департаменту:</label><br>
        <input type="number" id="dept_id" name="dept_id" required><br><br>

        <label for="name">Назва:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="info">Інформація:</label><br>
        <input type="text" id="info" name="info"><br><br>

        <button type="submit">Додати</button>
    </form>
</body>
</html>
<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dept_id = intval($_POST['dept_id']);
    $name = $_POST['name'];
    $info = $_POST['info'];

    $query = "EXEC usp_insert_depd @new_id = ". $dept_id .", @new_name = '". $name ."', @new_info = '". $info ."';";
    $stmt = $conn->prepare($query);

    try {
        $stmt->execute();
        echo "<p>Департамент успішно додано!</p>";
    } catch (PDOException $e) {
        echo "<p>Помилка: " . $e->getMessage() . "</p>";
    }
}
?>
