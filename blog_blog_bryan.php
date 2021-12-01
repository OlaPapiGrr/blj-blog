<?php
 $user = 'root';
 $password = '';
 $database = 'post';
 
 $pdo = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password, [
     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
 ]);

   
 if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
     if(isset($_POST['post-id-up'])) {
        $id  = $_POST['post-id-up'];
       /* echo "ID: " . $id;*/
        $pdo->exec("UPDATE posts set votes = votes + 1 where id = " . $id);
     } else if (isset($_POST['post-id-down'])) {
        $id  = $_POST['post-id-down'];
        $pdo->exec("UPDATE posts set votes = votes - 1 where id = " . $id);

     }
}



?>

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
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <div class="title_blog">
        <h1 class="title">Bryan's überkrasser Blog</h1>
    </div>
    <div class="nav_blog">
        <?php
            include 'include/nav_blog_bryan.php';

            
        ?>
            
    </div>
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
            <div>
            <div class="blog_votes"><?php echo($x['votes'])?></div>
            </div>
            <div>
                <form name="up-form" method="POST" action="blog_blog_bryan.php">
                    <input  class="blog_vote_up" type="image" value="up" name="up-button" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Green-Up-Arrow.svg/1200px-Green-Up-Arrow.svg.png">
                    <input type="hidden" name="post-id-up" value="<?= $x['id']?>">
                </form>
                <form name="down-form" method="POST">            
                    <input  class="blog_vote_down" type="image" value="down" name="down-button" src="https://lh3.googleusercontent.com/proxy/kLfULd46pR4u_P7e-9KXRDJeKVeYGaGnmjxzfN-KkfoIsmxMrK-nukvx88Y9b5Xgb71UzDp7tsrenAdG5XGEFHgG_eDdj3g">
                    <input type="hidden" name="post-id-down" value="<?= $x['id']?>">
                </form>
            </div>
            <div>
                <?php
                    
                ?>
            </div>
        <?php } ?>
    </div>
    <div>
   </div>
</body>
</html>