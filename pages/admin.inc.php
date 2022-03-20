<?php
$pdo = new Mypdo();
$questionManager = new QuestionManager($pdo);

$fileInserted = false;

if ($_FILES['fichier']) {
    $row = $questionManager->countQuestions();
    settype($row, "integer");
    if (($handle = fopen($_FILES["fichier"]["tmp_name"], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $row++;
            $idNiveau = $data[1];
            settype($idNiveau, "integer");
            $questionManager->insertQuestion($row, $data[0], $data[1]);
            $questionManager->insertReponses($row, $data[2], $data[3], $data[4], $data[5]);
        }
        fclose($handle);
        $fileInserted = true;
    }
}

?>

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'ajouter')" id="defaultOpen">Ajouter</button>
    <button class="tablinks" onclick="openCity(event, 'modifier')">Modifier</button>
    <button class="tablinks" onclick="openCity(event, 'supprimer')">Supprimer</button>
</div>


<!-- Tab content -->
<div id="ajouter" class="tabcontent">

    <form method="post" enctype="multipart/form-data" action="admin">
        <label for="fichier">Entrez un csv</label>
        <input type="file" name="fichier" id="fichier" accept=".csv" required>
        <input type="submit" value="Valider">
    </form>

    <?php if ($fileInserted) { ?>
        <small style="color: red;">Le fichier à bien été inséré</small>
    <?php } ?>



</div>

<div id="modifier" class="tabcontent">

    <!-- Faire la modification -->

    <?php
    $questions = $questionManager->getAllQuestionsAvecReponse();
    ?>

    <table>
        <thead>
        <tr>
            <th>Question</th>
            <th>Reponse</th>
            <th>Fake 1</th>
            <th>Fake 2</th>
            <th>Fake 3</th>
            <th>Niveau</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($questions as $question) { ?>
            <tr>
                <td><?php echo $question->question; ?></td>
                <td><?php echo $question->reponse; ?></td>
                <td><?php echo $question->fake1; ?></td>
                <td><?php echo $question->fake2; ?></td>
                <td><?php echo $question->fake3; ?></td>
                <td><?php echo $question->niveau; ?></td>
                
                <td><button onclick="modifier(<?php echo $question->id; ?> )">Modifier</button></td>
            </tr>
        <?php }; ?>

        </tbody>
    </table>


</div>

<div id="supprimer" class="tabcontent">

    <!-- Faire la suppression -->

    <?php
    $questions = $questionManager->getAllQuestionsAvecReponse();
    ?>

    <table class="table-dark table-stripped">
        <thead>
        <tr>
            <th>Question</th>
            <th>Reponse</th>
            <th>Fake 1</th>
            <th>Fake 2</th>
            <th>Fake 3</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($questions as $question) { ?>
            <tr>
                <td><?php echo $question->question; ?></td>
                <td><?php echo $question->reponse; ?></td>
                <td><?php echo $question->fake1; ?></td>
                <td><?php echo $question->fake2; ?></td>
                <td><?php echo $question->fake3; ?></td>
                
                <td><button onclick="supprimer(<?php echo $question->id; ?> )">Supprimer</button></td>
            </tr>
        <?php }; ?>

        </tbody>
    </table>

</div>

<script>

    function modifier(id) {
        window.location.href = 'index.php?page=12&rowToUpdate=' + id
    }

    function supprimer(id) {
        alert(id)
    }
</script>



<script>
    document.getElementById("defaultOpen").click();

    function openCity(evt, action) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(action).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>