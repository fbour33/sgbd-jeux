<?php 

try{
    $db = new PDO('mysql:host=localhost;dbname=sgbd_jeux;charset=utf8', 
    'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
}
catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}

?>