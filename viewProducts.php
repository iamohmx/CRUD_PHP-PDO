<?php
require_once 'connect.php';

// require_once 'editProduct.php';

$sql = "SELECT * FROM products ORDER BY id DESC";

$stmt = $conn->prepare($sql);

$stmt->execute();

$result = $stmt->fetchAll();

?>