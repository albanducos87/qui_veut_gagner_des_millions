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
        include_once('pages/accueil.inc.php');
        break;
    case 3:
        include_once('pages/inscription.inc.php');
        break;
    case 4:
        include_once('pages/connexion.inc.php');
        break;
    case 5;
        include_once('pages/admin.inc.php');
        break;
    case 6;
        include_once('pages/accueilUtilisateur.inc.php');
        break;
    case 7:
        include_once('pages/profil.inc.php');
        break;
    case 8:
        include_once('pages/jeu2.inc.php');
        break;
    case 9:
        include_once ('include/maj_base.php');
        break;
    case 10:
        include_once ('pages/classement.inc.php');
        break;
    case 11:
        include_once ('pages/deconnexion.inc.php');
        break;
    case 12:
        include_once ('pages/modifier.inc.php');
        break;
    case 13:
        include_once ('include/supprimer.inc.php');
        break;
    case 14:
        include_once ('include/setAdmin.inc.php');
        break;

    default : include_once('pages/accueil.inc.php');
}
?>
</main>