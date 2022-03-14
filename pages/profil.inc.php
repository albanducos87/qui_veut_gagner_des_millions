<?php

$pdo = new Mypdo();
$utilisateurManager = new UtilisateurManager($pdo);
?>
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'voirProfil')" id="defaultOpen">Mon profil</button>
    <button class="tablinks" onclick="openCity(event, 'modifierProfil')">Modifier mon profil</button>
</div>
<div id="voirProfil" class="tabcontent">
    <div id="page-wrapper">
        <section id="banner">
            <div class="inner">
                <h2>Mon profil</h2>
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
    </div>
</div>

<div id="modifierProfil" class="tabcontent">
    <div id="page-wrapper">
        <section id="banner">
            <div class="inner">
                <h2>Modifier mon profil</h2>
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
    </div>
</div>

<a href="index.php?page=0" class="button primary">Retour accueil</a>

<script>
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