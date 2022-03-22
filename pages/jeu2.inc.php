<?php
if (isset($_SESSION['idUtilisateur'])) {
$pdo = new Mypdo();
$partieManager = new PartieManager($pdo);
$niveauManager = new NiveauManager($pdo);
$questionManager = new QuestionManager($pdo);
$partieEnCours = $partieManager->initPartie($_SESSION['idUtilisateur']);
$_SESSION['enCours'] = 1;


$niveaux = $niveauManager->getAllNiveaux();
$questionManager->generateXml();


?>
<canvas id="canvas3d" width=“800” height=“600” frameborder=“0” style="border:0;"></canvas>

<div id="jeu">
    <div id="main">
    <div id="logo">
        <img id="logoimg" src="images/logo2.png" />
    </div>
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
    
    <div class="score">
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
                echo "<div id=".$id." class=\"rank\">$i&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;⬦&nbsp;&nbsp;&nbsp;&nbsp;€".$n['prix']."</div>";
                $i--;
            }
        } else {
            header('Location: index.php?page=0');
        }
            ?>
        </div>
        <br>
        <br>
        <br>
    </div> 
</div>

<script type="module">
    import { Application } from './runtime.js'; const app = new Application(); app.load('./scene.json');
</script>
