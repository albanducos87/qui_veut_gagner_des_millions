<?php
$pdo = new Mypdo();
$partieManager = new PartieManager($pdo);
$questionManager = new QuestionManager($pdo);
$reponseManager = new ReponseManager($pdo);

$partieActu = $partieManager->getPartieEnCours($_SESSION['idUtilisateur']);
$questionActuelle = $questionManager->getQuestionActuelle($partieActu['palier']);
?>

<form action="index.php?page=1" method="post">
    <div class="indices">
        <button class="indice material-icons" name="ami">
            phone
        </button>
        <button class="indice material-icons" name="indice50">
            analytics
        </button>
        <button class="indice material-icons" name="public">
            person
        </button>
    </div>
</form>

<?php
    if (isset($_POST['indice50'])) {
        $aEnlever = $reponseManager->indice5050($partieActu['idPartie']);
        var_dump($aEnlever);
        $f1 = 'fake'.$aEnlever[0];
        $f2 = 'fake'.$aEnlever[1];

        $_SESSION['reponsesAffichees'][$f1] = "null";
        $_SESSION['reponsesAffichees'][$f2] = "null";
    }
?>

<style>

    .indices {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .indice {
        cursor: pointer;
        margin: 4px;
        text-align: center;
        border: 1px solid coral;
        border-radius: 10px;
        background-color: navy;
        font-size: 32px;
        padding: 4px;
    }

</style>