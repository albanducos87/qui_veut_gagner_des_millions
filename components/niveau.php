<?php
$pdo = new Mypdo();
$niveauManager = new NiveauManager($pdo);
$partieManager = new PartieManager($pdo);

$partieActu = $partieManager->getPartieEnCours($_SESSION['idUtilisateur']);

?>

<div class="palier-container">
    <?php
    $allNiveaux = $niveauManager->getAllNiveaux();
    foreach($allNiveaux as $n) {
        if ($partieActu['prix'] == $n['prix']) {
    ?>
            <span class="palier white"><?php echo $n['prix'];?></span>
    <?php
        } else {
    ?>
            <span class="palier"><?php echo $n['prix'];?></span>
    <?php
        }
    }
    ?>

</div>
