<?php
require_once 'connect.php';
// Pagination
$sql1 = "SELECT * FROM products";
$s = $conn->prepare($sql1);
$s->execute();
$s->fetchAll(PDO::FETCH_ASSOC);
$total_result = $s->rowCount();

$limit_page = 16;
$page = @$_GET['page'] ? $_GET['page'] : 1;


$num_page = $total_result/$limit_page;
if (!($num_page == (int)$num_page))
    $num_page = (int)$num_page+1;

if ($page > $num_page)
    $page = $num_page;

$limit_start = ($page * $limit_page) - $limit_page; 
// End calc pagination

$sql = "SELECT * FROM products ORDER BY id DESC LIMIT {$limit_start},{$limit_page}";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

?>