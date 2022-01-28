<?php 
require_once("bdd/connexion.php"); 
if (empty($_COOKIE["isAdmin"])) {
  $_COOKIE["isAdmin"] = false;
} 
?>

<!DOCTYPE html>
<html lang="PHP">
<head>
<meta charset="UTF-8">
<title>MAMP</title>
<link href="css/style.css" rel="stylesheet" type="text/css"></link>
<link href="css/header.css" rel="stylesheet" type="text/css"></link>
<link href="css/footer.css" rel="stylesheet" type="text/css"></link>
<link rel="preload" href="./scene.json" as="fetch">

</head>
<body>
<div id='container'>
<canvas id="canvas3d"></canvas>
</div>
  <script type="module">
    import { Application } from './runtime.js'; const app = new Application(); app.load('./scene.json');
  </script>
</body>
</html>