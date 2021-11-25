<?php
function connectToIpDatabase() {
    try{
        return new PDO('mysql:host=mysql12.webland.ch;dbname=d041e_dagomez', 'd041e_dagomaz', '54321_Db!!!', [
            PDO::ATTR_ERRMODE               => pdo::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8',
        ]);
    } catch (PDOException $e){
        die('Keine Verbindung zur Datenbank möglich: '. $e->getMessage());
    }
}


?>