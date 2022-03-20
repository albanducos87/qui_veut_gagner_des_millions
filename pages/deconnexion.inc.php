<?php
$pdo = new Mypdo();
$utilisateurManager = new UtilisateurManager($pdo);

$_SESSION['idUtilisateur'] = null;
$_SESSION['enCours'] = null;

header("Refresh:0; url=index.php");
exit();