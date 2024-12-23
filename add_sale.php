<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати продаж</title>
</head>
<body>
    <h2>Додати новий продаж</h2>
    <form action="add_sale.php" method="POST">
        <label for="sale_id">ID Продажу:</label><br>
        <input type="number" id="sale_id" name="sale_id" required><br><br>

        <label for="check_no">Номер чеку:</label><br>
        <input type="number" id="check_no" name="check_no" required><br><br>

        <label for="good_id">ID Товару:</label><br>
        <input type="number" id="good_id" name="good_id" required><br><br>

        <label for="date_sale">Дата продажу:</label><br>
        <input type="date" id="date_sale" name="date_sale" required><br><br>

        <label for="quantity">Кількість:</label><br>
        <input type="number" id="quantity" name="quantity" required><br><br>

        <button type="submit">Додати</button>
    </form>
</body>
</html>
<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sale_id = $_POST['sale_id'];
    $check_no = $_POST['check_no'];
    $good_id = $_POST['good_id'];
    $date_sale = $_POST['date_sale'];
    $quantity = $_POST['quantity'];

    try {
        $query = "INSERT INTO Sales (SALE_ID, CHECK_NO, GOOD_ID, DATE_SALE, QUANTITY)
                  VALUES (:sale_id, :check_no, :good_id, :date_sale, :quantity)";
        $stmt = $conn->prepare($query);
    
        $stmt->bindParam(':sale_id', $sale_id);
        $stmt->bindParam(':check_no', $check_no);
        $stmt->bindParam(':good_id', $good_id);
        $stmt->bindParam(':date_sale', $date_sale);
        $stmt->bindParam(':quantity', $quantity);
    
        $stmt->execute();
        echo "Продаж успішно додано.";
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'Cannot add sale') !== false) {
            echo "Помилка: Ліміт кількості товару перевищено.";
        } else {
            echo "Інша помилка: " . $e->getMessage();
        }
    }
}
?>
