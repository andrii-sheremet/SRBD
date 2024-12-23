<?php
$serverName = "localhost";
$connectionOptions = array(
    "Uid" => "",
    "PWD" => ""
);

// Створення з'єднання
$conn = new PDO("sqlsrv:server=$serverName;Database=Shop", $connectionOptions["Uid"], $connectionOptions["PWD"]);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
