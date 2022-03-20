<?php




if (!isset($_GET["rowToUpdate"])) {
    header('location:index.php?page=5');
    exit();
} else {
        $pdo = new Mypdo();
        $questionManager = new QuestionManager($pdo);
        if (isset($_POST['question']) && isset($_POST['fake1']) && isset($_POST['fake2']) && isset($_POST['fake3']) && isset($_POST["reponse"]) && isset($_POST['niveau'])) {
            $questionManager->update($_GET["rowToUpdate"], $_POST["question"], $_POST["fake1"], $_POST["fake2"], $_POST["fake3"], $_POST["reponse"], $_POST["niveau"]);
            // header("location:index.php?page=5");
            // exit();
        }
        $question = $questionManager->getQuestion($_GET["rowToUpdate"]);
    }
?>

<?php 
    if (isset($_GET["rowToUpdate"])) {
?>

<form action="index.php?page=12&rowToUpdate=<?php echo $_GET["rowToUpdate"] ?>" method="post" enctype="multipart/form">
    <div class="rendered-form">
        <div class="formbuilder-text form-group field-question">
            <label for="questionValue" class="formbuilder-text-label">Question</label>
            <textarea class="form-" name="question" access="false" id="questionValue"><?php echo $question->question?></textarea>
        </div>
        <div class="formbuilder-text form-group field-fake1">
            <label for="fake1" class="formbuilder-text-label">Fake 1</label>
            <input type="text" class="form-control" name="fake1" access="false" id="fake1" value="<?php echo $question->fake1?>">
        </div>
        <div class="formbuilder-text form-group field-text-1647806572595">
            <label for="text-1647806572595" class="formbuilder-text-label">Fake 2</label>
            <input type="text" class="form-control" name="fake2" access="false" id="text-1647806572595" value="<?php echo $question->fake2?>">
        </div>
        <div class="formbuilder-text form-group field-text-1647806569983">
            <label for="text-1647806569983" class="formbuilder-text-label">Fake 3</label>
            <input type="text" class="form-control" name="fake3" access="false" id="text-1647806569983" value="<?php echo $question->fake3?>">
        </div>
        <div class="formbuilder-text form-group field-reponse">
            <label for="reponse" class="formbuilder-text-label">Reponse</label>
            <input type="text" class="form-control" name="reponse" access="false" id="reponse" value="<?php echo $question->reponse?>">
        </div>
        <div class="formbuilder-number form-group field-niveau">
            <label for="niveau" class="formbuilder-number-label">Niveau</label>
            <input type="number" class="form-control" name="niveau" access="false" min="1" max="15" step="1" id="niveau" value="<?php echo $question->niveau?>">
        </div>
        <button type="submit">Modifier</button>
    </div>
</form>
<?php
    }
?>

<style>

    .rendered-form {
        width: 70vw;
    }

    .rendered-form input, .rendered-form textarea {
        width: 600px;
        color: black;
    }

    .form-group {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }
</style>
