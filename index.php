<?php
require_once("bdd/connexion.php");
require_once("include/autoLoad.inc.php");
if (empty($_COOKIE["isAdmin"])) {
  $_COOKIE["isAdmin"] = false;
}
?>

<!DOCTYPE HTML>

<html>
<head>
    <title>QVGDM</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" />
    <noscript><link rel="stylesheet" href="css/noscript.css" /></noscript>
    <link rel="preload" href="./scene.json" as="fetch">
</head>
<body class="landing is-preload">

<?php
require_once ('components/main.php');
?>


<!-- Scripts -->
<script type="module">
    import { Application } from './runtime.js'; const app = new Application(); app.load('./scene.json');
</script>
<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>