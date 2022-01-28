<main>

<?php
if (!empty($_GET["page"])) {
    $page=$_GET["page"];
}	else {
    $page=0;
}
switch ($page) {
    case 0:
        include_once('pages/accueil.php');
        break;
    case 1:
        include("pages/emprunt.php");
        break;
    case 2:
        include_once('pages/historique.php');
        break;
    case 3:
        include_once('pages/comptes.php');
        break;
    default : include_once('pages/accueil.php');
}
?>
</main>