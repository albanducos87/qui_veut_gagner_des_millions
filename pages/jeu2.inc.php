<?php
$pdo = new Mypdo();
$partieManager = new PartieManager($pdo);
$niveauManager = new NiveauManager($pdo);
$questionManager = new QuestionManager($pdo);
if ($_SESSION['enCours'] != 1) {
    $partieEnCours = $partieManager->initPartie($_SESSION['idUtilisateur']);
    $_SESSION['enCours'] = 1;
}

$niveaux = $niveauManager->getAllNiveaux();
$questionManager->generateXml();

if (isset($_SESSION['idUtilisateur'])) {
?>

<div id="main">
    <div id="logo"><img id="logoimg" width="300px" src="images/logo2.png" /></div>
    <div id="qanda">
        <div id="question" class="element"></div>
        <table id="table">
            <tr>
                <td>
                    <div id="element0" class="element"><span class="goldenLetter">A: </span><span id="ans1"></span></div>
                </td>
                <td width="50%">
                    <div id="element1" class="element"><span class="goldenLetter">B: </span><span id="ans2"></span></div>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <div id="element2" class="element"><span class="goldenLetter">C: </span><span id="ans3"></span></div>
                </td>
                <td width="50%">
                    <div id="element3" class="element"><span class="goldenLetter">D: </span><span id="ans4"></span></div>
                </td>
            </tr>
        </table>
    </div>
</div>


<div id="ranking">
    <div id="joker">
        <img id="joker_5050" class="joker" src="images/joker_5050.svg" height="50"/>
        <img id="joker_tel" class="joker" src="images/joker_tel.svg" height="50"/>
        <img id="joker_pub" class="joker" src="images/joker_pub.svg" height="50"/>
    </div>
    <?php
    $i=15;
    foreach ($niveaux as $n) {
        $id = "r_".$i;
        echo "<div id=".$id.">$i&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⬦&nbsp;&nbsp;&nbsp;&nbsp;€".$n['prix']."</div>";
        $i--;
    }
} else {
    header('Location: index.php?page=0');
}
    ?>
</div>

<div id="retour">
    <a href="index.php?page=6" class="button primary"> Accueil </a>
</div>
