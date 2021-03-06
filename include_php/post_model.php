<?php
    $eastereggkey = 'nothund';
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
        elseif(strlen($name) > 30){
            echo('<p class="error-box">Bitte geben Sie einen gültigen Namen ein (max. 30 Zeichen).</p>');
        }
        elseif($title === ''){
            echo('<p class="error-box">Bitte geben Sie einen Titel ein.</p>');
        }
        elseif(strlen($title) > 20){
            echo('<p class="error-box">Bitte geben Sie einen gültigen Titel ein (max. 20 Zeichen).</p>');
        }
        elseif($nachricht === ''){
            echo('<p class="error-box">Bitte geben Sie eine Nachricht ein.</p>');
        } 
        elseif(strlen($url) > 100){
            echo('<p class="error-box">Bitte geben Sie einen gültigen Link ein (max. 100 Zeichen).</p>');
        } 
        elseif(filter_var($url, FILTER_VALIDATE_URL) === FALSE && $url !== '') {
            echo('<p class="error-box">Bitte geben Sie eine gültige URL ein.</p>');
        } elseif($name === 'hund') {
            $eastereggkey = 'hund';
        } else {
        $dbConnection = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_bramrein', 'd041e_bramrein', '54321_Db!!!');
        $stmt = $dbConnection->prepare('INSERT INTO posts (created_by, created_at, post_title, post_text, url)
                                            VALUES(:user, now(), :titel, :nachricht, :url)');
        $stmt->execute([':user' => $name, ':titel' => $title, ':nachricht' => $nachricht, ':url' => $url]);
        }
    }


?>