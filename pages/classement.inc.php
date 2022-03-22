<?php
$pdo = new Mypdo();
$partieManager = new PartieManager($pdo);
$classement = $partieManager->getClassement();
if (isset($_SESSION['idUtilisateur'])) {
?>

<h2 align="center">Voici le classement général des parties</h2>
<div class="classement">
    <div class="tbl-deahder">
        <table>
            <thead>
                <tr>
                    <th><strong>Nom</strong></th>
                    <th><strong>Prénom</strong></th>
                    <th><strong>Somme gagnée</strong></th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table>
            <tbody>
                <?php
                foreach($classement as $c) {
                    $color = "#243797";
                    if ($c['idUtilisateur'] == $_SESSION['idUtilisateur']) {

                    }
                ?>
                    <tr bgcolor="<?php echo $color;?>">
                        <td><?php echo $c['nom'];?></td>
                        <td><?php echo $c['prenom'];?></td>
                        <td><?php echo $c['prix'];?> €</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<p align="center"><a href="home" class="button primary">Retour accueil</a></p>

<?php
} else {
    header("Location: accueil");
}