<?php
define('ENV', true);
require_once "include/autoLoad.inc.php";
session_start();
?>

<!DOCTYPE HTML>

<html>
<head>
    <title>QVGDM</title>
    <meta charset="utf-8" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/admin.css" />
    <link href='//fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href='//fonts.googleapis.com/css?family=Aldrich' rel='stylesheet'>
    <link rel="stylesheet" href="css/quizMain.css" />
    <noscript><link rel="stylesheet" href="css/noscript.css" /></noscript>
    <link rel="preload" href="./scene.json" as="fetch">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="landing is-preload">
  <script src="js/jquery.min.js"></script>
  <?php
require_once 'components/main.php';
?>


<script src="js/main.js"></script>
<script src="js/quizMain.js" type="text/javascript"></script>
</body>
</html>