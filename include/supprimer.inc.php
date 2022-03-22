<?php
    if (isset($_SESSION['admin'])) {
        if ($_GET["id"]) {
            $pdo = new Mypdo();
            $questionManager = new QuestionManager($pdo);
            $questionManager->supprimerQuestion($_GET["id"]);
        }
    } else {
        header("Location:admin");
        exit();
    }

?>