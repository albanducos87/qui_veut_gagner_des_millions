<?php

$pdo = new Mypdo();
$utilisateurManager = new UtilisateurManager($pdo);
$profilEnCours = $utilisateurManager->getInformationsUser($_SESSION['idUtilisateur']);

if (isset($_SESSION['idUtilisateur'])) {
?>
<p align="right"><a href="home" onclick="window.alert('Voulez-vous vous déconnecter ?')"><i class="fa fa-sign-out"></i></a></p>
<div class="tab">
    <button class="tablinks tabProfil" onclick="openCity(event, 'voirProfil')" id="defaultOpen">Mon profil</button>
    <button class="tablinks tabModif" onclick="openCity(event, 'modifierProfil')">Modifier mon profil</button>
</div>
<br>
<div id="voirProfil" class="tabcontent">
    <h2 align="center">Mon profil</h2>
    <div class="form">
        <div class="input-container mail">
            <input id="nom" class="input" type="text" name="nom" value="<?php echo $profilEnCours['nom'] ?>" disabled/>
            <div class="cut"></div>
            <label for="nom" class="placeholder">Nom</label>
        </div>
        <div class="input-container mail">
            <input id="prenom" class="input" type="text" name="prenom" value="<?php echo $profilEnCours['prenom'] ?>" disabled/>
            <div class="cut"></div>
            <label for="prenom" class="placeholder">Prénom</label>
        </div>
        <div class="input-container mail">
            <input id="mail" class="input" type="email" name="mail" value="<?php echo $profilEnCours['mail'] ?>" disabled/>
            <div class="cut"></div>
            <label for="mail" class="placeholder">Mail</label>
        </div>
    </div>
    <p align="center"><a href="home" class="button primary">Retour accueil</a></p>
</div>

<div id="modifierProfil" class="tabcontent">
    <h2 align="center">Modifier mon profil</h2>
    <form action="profil" method="post" onsubmit="traiterClicB1(<?php echo $_SESSION['idUtilisateur'] ?>,<?php echo $_POST['nom'] ?>, <?php echo $_POST['prenom'] ?>, <?php echo $_POST['mail'] ?>)">
        <div class="form">
            <div class="input-container mail">
                <input id="nom" class="input" type="text" name="nom" value="<?php echo $profilEnCours['nom'] ?>" required/>
                <div class="cut"></div>
                <label for="nom" class="placeholder">Nom</label>
            </div>
            <div class="input-container mail">
                <input id="prenom" class="input" type="text" name="prenom" value="<?php echo $profilEnCours['prenom'] ?>" required/>
                <div class="cut"></div>
                <label for="prenom" class="placeholder">Prénom</label>
            </div>
            <div class="input-container mail">
                <input id="mail" class="input" type="email" name="mail" value="<?php echo $profilEnCours['mail'] ?>" required/>
                <div class="cut"></div>
                <label for="mail" class="placeholder">Mail</label>
            </div>
            <input type="submit" class="submit" name="submit" value="Modifier"/>
        </div>
    </form>
    <p align="center"><a href="home" class="button primary">Retour accueil</a></p>
</div>

<?php

} else {
    header('Location: accueil');
}
?>
<script>

    function traiterClicB1(idUtilisateur, nom, prenom, mail) {
        $.get("index.php?page=13", {idUtilisateur: idUtilisateur, nom: nom, prenom: prenom, mail: mail}, console.log("profil modifié"));
    }

    document.getElementById("defaultOpen").click();

    function openCity(evt, action) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(action).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>