<?php

$pdo = new Mypdo();
$utilisateurManager = new UtilisateurManager($pdo);
$retour = 0;

if (empty($_POST["mail"]) || $retour == 0) {
?>
    <div id="page-wrapper">
        <section id="banner">
            <div class="inner">
                <h2>Inscription</h2>
                <br><br><br>
                <form action="index.php?page=3" method="post">

                    <div class="form">
                        <div class="input-container mail">
                            <input id="nom" class="input" type="text" name="nom" required/>
                            <div class="cut"></div>
                            <label for="nom" class="placeholder">Nom</label>
                        </div>
                        <div class="input-container mail">
                            <input id="prenom" class="input" type="text" name="prenom" required/>
                            <div class="cut"></div>
                            <label for="prenom" class="placeholder">Prénom</label>
                        </div>
                        <div class="input-container mail">
                            <input id="mail" class="input" type="email" name="mail" required/>
                            <div class="cut"></div>
                            <label for="mail" class="placeholder">Mail</label>
                        </div>
                        <div class="input-container mdp">
                            <input id="mdp" class="input" type="password" name="pwd" required/>
                            <div class="cut"></div>
                            <label for="mdp" class="placeholder">Mot de passe</label>
                        </div>
                        <input type="submit" class="submit"/>
                    </div>
                </form>
            </div>
        </section>
        <li><a href="index.php?page=0" class="button primary">Retour accueil</a></li>
    </div>
<?php
} else {
    $errorMail = 0;
    if ($utilisateurManager->isMailOk($_POST["mail"]) == 0) {
        $retour = $utilisateurManager->inscription($_POST["nom"], $_POST["prenom"], $_POST["mail"], $_POST["pwd"]);
    } else {
        $errorMail = 1;
    }

    if ($errorMail == 1) {
        echo '<script type="text/javascript">console.log("non");</script>';
    }
    if ($retour == 0) {
        echo "Il y a eu un problème au moment de l'inscription";
    } else {
        header("Location: index.php?page=2");
        exit();
    }
}
?>