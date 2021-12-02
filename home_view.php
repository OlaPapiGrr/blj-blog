<?php
    include 'include_php/home_model.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_ProjektBlog.css">
    <link rel="icon" href="images/icon_blog.png">
    <title>Home</title>
</head>

<body class="container_home container">
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <div class="title_home">
        <h1 class="title">Home</h1>
    </div>
    <div class="nav_home">
        <?php
        include 'include_nav/nav_view.php';
        ?>
    </div>
    <div class="home_others">
        <div class="home_others_title">
            <p>Andere Blogs</p>
        </div>
        <?php
        foreach ($others as $row) {
            $link = $row['url'];
            $description = $row['description'];
        ?>
            <div><?php echo "<a href='" . $link . "'class='otherblogs'>" . $description . "</a><br><br>"; ?></div>
        <?php } ?>
    </div>
    <div class="home_big_title">
        <p class="home_wellcome">Herzlich Willkommen zu</p>
        <p class="home_wellcome2">Bryan's überkrasser Blog </p>
        <img class="home_gif" src="images/giphy.webp">
        <form action="easteregg_view.php">
            <input class="easteregg_button" type="submit">
        </form>
    </div>

</body>

</html>