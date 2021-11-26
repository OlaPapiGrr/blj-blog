<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_blog_bryan.css">
    <title>Blog</title>
</head>
<body class="container_blog container">
    <div class="title_blog">
        <h1 class="title">Bryan's überkrasser Blog</h1>
    </div>
    <div class="nav_blog">
        <?php
            include 'include/nav_blog_bryan.php';

            $user = 'root';
            $password = '';
            $database = 'post';
            
            $pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            ?>
            <div class="post_box_position">
                <?php
                $stmt = $pdo->query('SELECT * FROM `posts`');
                foreach($stmt->fetchAll() as $x){ 
                ?>
                    <div class="post_box">
                        <div class="blog_created_by"><?php echo($x['created_by'])?></div>
                        <div class="blog_post_title"><?php echo($x['post_title'])?></div>
                        <div class="blog_created_at"><?php echo($x['created_at'])?></div>
                        <div class="blog_post_text"><?php echo($x['post_text'])?></div>
                        <div class="blog_url"><?php echo('<img class="blog_url" src=' .$x['url'] . '>' )?></div>
                        
                        
                    </div>
                <?php } ?>
            </div>
    </div>
</body>
</html>