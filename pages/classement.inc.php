<?php
$pdo = new Mypdo();
$partieManager = new PartieManager($pdo);
$classement = $partieManager->getClassement();
if (isset($_SESSION['idUtilisateur'])) {
?>

<h2>Voici le classement des 10 meilleurs joueurs</h2>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Somme gagnée</th>
    </tr>
    <?php
    foreach($classement as $c) {
    ?>
        <tr>
            <th><?php echo $c['nom'];?></th>
            <th><?php echo $c['prenom'];?></th>
            <th><?php echo $c['prix'];?> €</th>
        </tr>
    <?php
    }
} else {
    header('Location: index.php?page=0');
}
    ?>
</table>