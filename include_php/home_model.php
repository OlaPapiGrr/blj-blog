<?php

$pdo2 = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dagomez', 'd041e_dagomez', '54321_Db!!!', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$stmt = $pdo2->query('SELECT url, description FROM urls order by description asc');
$otherblogs = $stmt->fetchAll();

$sql = "SELECT description, url FROM urls ORDER BY description asc";
$others = $pdo2->query($sql);

?>
