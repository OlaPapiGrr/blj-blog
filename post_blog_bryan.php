<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_blog_bryan.css">
    <title>Post</title>
</head>
<body class="container_home container">
    <div class="title title_post">
        <h1 >Post</h1>
    </div>
    <div class="nav_post">
        <?php
            include 'include/nav_blog_bryan.php';
        ?>
    </div>
    <div class="text_post">
        <div class="post_name">
            <h3>User</h3>
            <input type=text placeholder="Gib deinen Username ein">
        </div>
        <div class="post_titel">
        <h3>Titel</h3>
            <input type=text placeholder="Gib einen Titel ein">
        </div>
        <?php
            $today = date("j ,F ,Y , H:i");
            
        ?>
    </div>

</body>
</html>