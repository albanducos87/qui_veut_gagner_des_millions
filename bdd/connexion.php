<?php
$db_user = 'root';
$db_password = 'root';
$db_port = 3306;

try
{
  $dbh = new PDO('mysql:host=localhost;dbname=information_schema', $db_user, $db_password);
}
  catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }
  ?>