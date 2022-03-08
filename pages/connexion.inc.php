<?php
$pdo = new Mypdo();
$utilisateurManager = new UtilisateurManager($pdo);
$retour = 0;
?>

<div id="page-wrapper">
    <section id="banner">
        <div class="inner">
            <h2>Connexion</h2>
            <br><br><br>
            <form action="index.php?page=" method="post">
                <div class="form">
                    <div class="input-container mail">
                        <input id="mail" class="input" name="mail" type="email" required/>
                        <div class="cut"></div>
                        <label for="mail" class="placeholder">Mail</label>
                    </div>
                    <div class="input-container mdp">
                        <input id="mdp" class="input" name="pwd" type="password" required/>
                        <div class="cut"></div>
                        <label for="mdp" class="placeholder">Mot de passe</label>
                    </div>
                    <button type="text" class="submit" name="submit">Connexion</button>
                    <div>
                        <?php
                            if(isset($_POST["submit"])){
                                if(isset($_POST["mail"]) && isset($_POST["pwd"])){
                                    if($utilisateurManager->isLoginOk($_POST["mail"], $_POST["pwd"])){
                                        $_SESSION["idUtilisateur"] = $utilisateurManager->isLoginOk($_POST["mail"], $_POST["pwd"]);
                                    }else{
                                        echo "Identifiants incorrects";
                                    }
                                }else{
                                    echo"Veuillez remplir tous les champs";
                                }
                            }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>