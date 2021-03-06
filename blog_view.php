<?php
    include 'include_php/blog_model.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet_ProjektBlog.css">
    <link rel="icon" href="images/icon_blog.png">
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
        <h1 class="title">Bryan's ├╝berkrasser Blog</h1>
    </div>
    <div class="nav_blog">
        <?php
            include 'include_nav/nav_view.php';

            
        ?>
            
    </div>
    <div class="post_box_position">
        <?php
           
           
            foreach($posts as $x){ 
        ?>
            <div class="post_box">
                <div>
                    <div class="blog_created_by"><?php echo($x['created_by'])?></div>
                    <div class="blog_post_title"><?php echo($x['post_title'])?></div>
                    <div class="blog_created_at"><?php echo($x['created_at'])?></div>
                    <div class="blog_post_text"><?php echo($x['post_text'])?></div>
                    <div class="blog_url"><?php echo('<img class="blog_url" src=' .$x['url'] . '>' )?></div>
                    <div class="blog_comments_title"><p>Kommentare</p></div>
                    <form name="comments_form" method="POST">
                        <input class="text_field_blog" type="text" placeholder="Schreib einen Kommentar" name="comment_block">
                        <input type="hidden" name="comment-id" value="<?= $x['id']?>">
                    </form>
                    <div class="blog_comments_position">
                    <?php 
                        foreach($comments as $comment){
                            if($comment['id'] === $x['id']){
                                if($comment !== ''){
                                    $text = $comment['comment'];
                                    $breaktext = wordwrap($text, 78, "\n", true)
                                ?>
                                <div class="blog_comment"><?php echo($breaktext);?><br></div>
                                <?php
                                }
                            }
                        }
                    ?>
                    </div>
                    

                </div>
            </div>
        <div>
            <div class="blog_votes"><?php echo($x['votes'])?></div>
        </div>
            <div>
                <form name="up-form" method="POST">
                    <input  class="blog_vote_up" type="image" value="up" name="up-button" src="images/Green-Up-Arrow.svg.png">
                    <input type="hidden" name="post-id-up" value="<?= $x['id']?>">
                </form>
                <form name="down-form" method="POST">            
                    <input  class="blog_vote_down" type="image" value="down" name="down-button" src="images/RedDownArrow.svg.png">
                    <input type="hidden" name="post-id-down" value="<?= $x['id']?>">
                </form>
            </div>   
            
                <?php } ?>
                
        <div>
            
   </div>
</body>
</html>