<?php
$pdo = new Mypdo();
$partieManager = new PartieManager($pdo);
$questionManager = new QuestionManager($pdo);
$reponseManager = new ReponseManager($pdo);

$partieActu = $partieManager->getPartieEnCours($_SESSION['idUtilisateur']);
$questionActuelle = $questionManager->getQuestionActuelle($partieActu['palier']);
$_SESSION['reponsesAffichees'] = $reponseManager->getReponses($questionActuelle['idQuestion']);

$placeReponse = rand(1,4);

?>
<div class="container">
    <div class="container-reponse">
        <?php
        switch ($placeReponse) {
            case 1:
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['reponse']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake1']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake2']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake3']."</div>";
                break;

            case 2:
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake1']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['reponse']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake2']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake3']."</div>";

                break;

            case 3:
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake1']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake2']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['reponse']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake3']."</div>";

                break;

            case 4:
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake1']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake2']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['fake2']."</div>";
                echo "<div class='reponse'>".$_SESSION['reponsesAffichees']['reponse']."</div>";

                break;
        }
        ?>
    </div>

    <div id="valider">
        <button>
            Valider
        </button>
    </div>

</div>


<script type="text/javascript">

    var boutonReponseSelected
    var idSelected

    var valider = document.getElementById('valider')
    valider.addEventListener('click', () => {
        boutonReponseSelected.style.backgroundColor = "green"
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "coral"
        }, 100)
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "green"
        }, 200)
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "coral"
        }, 300)
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "green"
        }, 400)
    })

    var liste = document.getElementsByClassName('reponse')
    for(let i = 0; i < liste.length; i++) {
        liste[i].addEventListener("click", () => {
            if (boutonReponseSelected) {
                boutonReponseSelected.style.backgroundColor = "navy"
            }
            boutonReponseSelected = liste[i];
            idSelected = i;
            boutonReponseSelected.style.backgroundColor = "coral";
            valider.style.display = "block";
        })
    }



</script>