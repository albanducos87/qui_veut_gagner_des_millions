<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'qvgdm_base';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=qvgdm_base', $db_user, $db_password);
}
catch (PDOException $e) {
    echo 'Echec lors de la connexion : ' . $e->getMessage();
}
?>