<?php    
    $pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=post', 'd041e_bramrein', '54321_Db!!!',[
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
        if(isset($_POST['comment-id'])) {
           $idComment  = $_POST['comment-id'];
           $comment = $_POST['comment_block'] ?? '';
           $comment = htmlspecialchars($comment);
           if($comment !== ''){ 
           $stmt = $pdo->prepare('INSERT INTO comments (comment, id, Time)
                                                   VALUES(:comment, :id, now())');
               $stmt->execute([':comment' => $comment, ':id' => $idComment]);
           }
        }   
    }
    $stmt = $pdo->query('SELECT * FROM `comments` ORDER BY `Time` DESC');
    $comments = $stmt->fetchAll();
   
    $stmt = $pdo->query('SELECT * FROM `posts`');
    $posts = $stmt->fetchAll();
?>