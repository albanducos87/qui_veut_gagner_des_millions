<?php
define('ENV', true);
require_once("include/autoLoad.inc.php");
session_start();
?>

<!DOCTYPE HTML>

<html>
<head>
    <title>QVGDM</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/admin.css" />
    <link href='//fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href='//fonts.googleapis.com/css?family=Aldrich' rel='stylesheet'>
    <link rel="stylesheet" href="css/quizMain.css" />
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
<script src="js/quizMain.js" type="text/javascript"></script>

</body>
</html>