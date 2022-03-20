<?php
if (!isset($_GET['palier']) || !isset($_GET['fini'])) {
    die("erreur de donnée");
}

session_start();

$pdo = new Mypdo();
$partieManager = new PartieManager($pdo);
$partieActu = $partieManager->getPartieEnCours($_SESSION['idUtilisateur']);
$partieManager->majPartieUtilisateur($_GET['palier'], $partieActu['idPartie']);
echo "fini : "."<script>console.log(".$_GET['fini'].")</script>";
if ($_GET['fini'] == 2) {
    $_SESSION['enCours'] = 0;
}