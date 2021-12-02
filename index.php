<?php 
       
        $page = $_GET['page'] ?? '';

        if ($page === '' || $page === 'home') {
            require 'home_view.php';
        }
        else if ($page === 'blog') {
            require 'blog_view.php';
        }
        else if ($page === 'post') {
            require 'post_view.php';
        }
        else {
            require '404_view.php';
        }
        
    ?>