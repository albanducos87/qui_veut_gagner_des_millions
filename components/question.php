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
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/admin.css" />
<link rel="stylesheet" href="css/quizMin.css" />
<noscript><link rel="stylesheet" href="css/noscript.css" /></noscript>
<link rel="preload" href="./scene.json" as="fetch">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<style>



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