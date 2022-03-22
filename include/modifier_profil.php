<?php
if (!isset($_GET['idUtilisateur']) || !isset($_GET['nom']) || !isset($_GET['prenom']) || !isset($_GET['mail'])) {
    die("Erreur de données");
}

$pdo = new Mypdo();
$utilisateurManager = new UtilisateurManager($pdo);
$utilisateurManager->modifierProfil($_GET['idUtilisateur'],$_GET['nom'],$_GET['prenom'],$_GET['mail']);