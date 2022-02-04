<main>

<?php
if (!empty($_GET["page"])) {
    $page=$_GET["page"];
}	else {
    $page=0;
}
switch ($page) {
    case 0:
        include_once('pages/accueil.inc.php');
        break;
    case 1:
        include("pages/jeu.inc.php");
        break;
    case 2:
        include_once('pages/connexion.inc.php');
        break;
    case 3:
        include_once('pages/inscription.inc.php');
        break;
    case 4:
        include_once('pages/connexion.inc.php');
    default : include_once('pages/accueil.inc.php');
}
?>
</main>