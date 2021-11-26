<?php

$pdo2 = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_dagomez', 'd041e_dagomez', '54321_Db!!!', [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$stmt = $pdo2->query('SELECT url, description FROM urls order by description asc');
$otherblogs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_blog_bryan.css">
    <title>Home</title>
</head>

<body class="container_home container">
    <div class="title_home">
        <h1 class="title">Home</h1>
    </div>
    <div class="nav_home">
        <?php
        include 'include/nav_blog_bryan.php';
        ?>
    </div>
    <div class="home_others">
        <div class="home_others_title">
            <p>Andere Blogs</p>
        </div>
        <?php
        $sql = "SELECT description, url FROM urls ORDER BY description asc";
        foreach ($pdo2->query($sql) as $row) {
            $link = $row['url'];
            $description = $row['description'];
        ?>
            <div><?php echo "<a href='" . $link . "'class='otherblogs'>" . $description . "</a><br><br>"; ?></div>
        <?php } ?>
    </div>
    <div class="home_big_title">
        <p class="home_wellcome">Herzlich Willkommen zu</p>
        <p class="home_wellcome2">Bryan's überkrasser Blog </p>
        <img class="home_gif" src="https://media2.giphy.com/media/UTMWtgccng4QJGknlJ/giphy.gif">
    </div>

</body>

</html>