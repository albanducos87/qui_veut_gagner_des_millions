<?php
define('ENV', true);
require_once("bdd/connexion.php");
require_once("include/autoLoad.inc.php");
?>

<!DOCTYPE HTML>

<html>
<head>
    <title>QVGDM</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <noscript><link rel="stylesheet" href="css/noscript.css" /></noscript>
    <link rel="preload" href="./scene.json" as="fetch">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body class="landing is-preload">

<?php
require_once ('components/main.php');
?>

<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>