<?php
$pdo = new Mypdo();
$partieManager = new PartieManager($pdo);
$questionManager = new QuestionManager($pdo);

$partieActu = $partieManager->getPartieEnCours($_SESSION['idUtilisateur']);
$questionActuelle = $questionManager->getQuestionActuelle($partieActu['palier']);
?>
<span id="question">
    <?php
    echo $questionActuelle['question'];
    ?>
</span>

<style>

    #question {
        display: block;
        width: 100%;
        text-align: center;
        border: 1px solid coral;
        border-radius: 10px;
        background-color: navy;
        margin: 8px;
        padding: 6px;
    }

</style>

<script>
    var text = document.getElementById('question');
    var splitText = text.innerText.split('');

    text.innerHTML = '';
    i = 0
    setInterval(function(){
            AjoutDeLettre()}
        , 10 )

    function AjoutDeLettre(){
        if(i < splitText.length){
            text.innerHTML += splitText[i];
            i++;
        }
    }
</script>