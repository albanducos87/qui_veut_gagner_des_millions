<?php
$pdo = new Mypdo();
$questionManager = new QuestionManager($pdo)
?>

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'ajouter')" id="defaultOpen">Ajouter</button>
    <button class="tablinks" onclick="openCity(event, 'modifier')">Modifier</button>
    <button class="tablinks" onclick="openCity(event, 'supprimer')">Supprimer</button>
</div>


<!-- Tab content -->
<div id="ajouter" class="tabcontent">

    <!-- Ajouter le csv -->


</div>

<div id="modifier" class="tabcontent">

    <!-- Faire la modification -->

    <?php
        $questions = $questionManager->getAllQuestionsAvecReponse();
    ?>

    <table>
        <thead>
            <th>Questions</th>
            <th>Reponse</th>
            <th>Fake 1</th>
            <th>Fake 2</th>
            <th>Fake 3</th>
        </thead>
        <tbody>
            
            <?php 
                echo $questions;
                foreach($questions as $question) { ?>
            <tr>
                
                <td><?php echo $question["question"]; ?></td>
                <td><?php echo $question["reponse"]; ?></td>
                <td><?php echo $question["fake1"]; ?></td>
                <td><?php echo $question["fake2"]; ?></td>
                <td><?php echo $question["fake3"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>


</div>

<div id="supprimer" class="tabcontent">

    <!-- Faire la suppression -->

</div>



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