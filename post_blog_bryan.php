
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_blog_bryan.css">
    <title>Post</title>
</head>
<body class="container_post container">
    <header class="title_post">
        <h1 class="title title_post">Post</h1>
    </header>
    <div class="nav_post">
        <?php
            include 'include/nav_blog_bryan.php';
        ?>
    </div>
    <form class="text_post" method="POST">
        <div>
            <h3 class="post_name">User</h3>
            <input name="name" class="post_name" type=text placeholder="Gib deinen Username ein" value="<?php $name ?? ''?>"></input>
            
            <h3 class="post_titel">Titel</h3>
            <input name="title" class="post_titel" type=text placeholder="Gib einen Titel ein" value="<?php $title ?? ''?>"></input>
            
            <h3 class="post_link">Link</h3>
            <input name="url" class="post_link" type=text placeholder="Gib einen Link ein" value="<?php $url ?? ''?>"></input>
            
            <h3 class="post_nachricht">Nachricht</h3>
            <textarea class="post_nachricht" name="post" cols="40" rows="6" maxlenght="1000" class="post_nachricht" type=text 
                      placeholder="Gib eine kurze Nachricht ein (max. 1000 Zeichen)" value="<?php $nachricht ?? ''?>"></textarea><br>
            
                      <input class="post_button" type="submit" value="Posten">
        </div>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $name = htmlspecialchars($name);
            $title = $_POST['title'] ?? '';
            $title = htmlspecialchars($title);
            $nachricht = $_POST['post'] ?? '';
            $nachricht = htmlspecialchars($nachricht);
            $url = $_POST['url'] ?? '';
            $url = filter_var($url, FILTER_SANITIZE_URL);

            if($name === ''){
                echo('<p class="error-box">Bitte geben Sie einen Namen ein.</p>');
            }
            elseif($title === ''){
                echo('<p class="error-box">Bitte geben Sie einen Titel ein.</p>');
            }
            elseif($nachricht === ''){
                echo('<p class="error-box">Bitte geben Sie eine Nachricht ein.</p>');
            } elseif(filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
                echo('<p class="error-box">Bitte geben Sie eine gültige URL ein.</p>');
            } else{

            $dbConnection = new PDO('mysql:host=localhost;dbname=post', 'root', '');
            $stmt = $dbConnection->prepare('INSERT INTO posts (created_by, created_at, post_title, post_text, url)
                                                VALUES(:user, now(), :titel, :nachricht, :url)');
            $stmt->execute([':user' => $name, ':titel' => $title, ':nachricht' => $nachricht, ':url' => $url]);
            }
        }
    ?>
</body>
</html>