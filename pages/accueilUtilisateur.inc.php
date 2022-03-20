<?php
if (isset($_SESSION['idUtilisateur'])) {
    $_SESSION['enCours'] = 0;
?>
<div id="page-wrapper">
    <section id="banner">
        <div class="inner">
            <h2>Bienvenue dans</h2>
            <p>Qui veut gagner<br />
                des millions ?<br /></p>
            <ul class="actions special">
                <li><a href="jeu" class="button primary">Nouvelle partie</a></li>
                <li><a href="profil" class="button primary">Mon profil</a></li>
                <li><a href="classement" class="button primary">Classement Général</a></li>
            </ul>
        </div>
    </section>
</div>
<?php
} else {
    header('Location: accueil');
}
?>