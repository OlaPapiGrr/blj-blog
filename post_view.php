<?php
    include 'include_php/post_model.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_ProjektBlog.css">
    <title>Post</title>
</head>
<body class="container_post container">
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <header class="title_post">
        <h1 class="title title_post">Post</h1>
    </header>
    <div class="nav_post">
        <?php
            include 'include_nav/nav_blog_bryan.php';
        ?>
    </div>
    <form class="text_post" method="POST">
        <div>
            <h3 class="post_name">User</h3>
            <input maxlenght="15" name="name" class="post_name text_field" type=text placeholder="Gib deinen Username ein" value="<?php $name ?? ''?>"></input>
            
            <h3 class="post_titel">Titel</h3>
            <input maxlenght="10" name="title" class="post_titel text_field" type=text placeholder="Gib einen Titel ein" value="<?php $title ?? ''?>"></input>
            
            <h3 class="post_link_title">Link</h3>
            <input name="url" class="post_link text_field" type=text placeholder="Gib einen Link ein (max. 100 Zeichen)" value="<?php $url ?? ''?>"></input>
            
            <h3 class="post_nachricht">Nachricht</h3>
            <textarea class="post_nachricht" name="post" cols="40" rows="6" maxlenght="1000" class="post_nachricht text_field" type=text 
                      placeholder="Gib eine kurze Nachricht ein (max. 1000 Zeichen)" value="<?php $nachricht ?? ''?>"></textarea><br>
            
            <input class="post_button post_button_style" type="submit" value="Posten">
        </div>
    </form>
    
</body>
</html>