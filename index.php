<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Размеры окна</title>
    <link rel="stylesheet" href="Helios/styles/main.css" type="text/css"/>
</head>
<body>
<?php
include_once 'Helios/src/form.php';
if (count($_POST) > 0) {
    include_once 'Helios/src/intersections-calculation.php';
    include_once 'Helios/src/window-sides-length-calculation.php';
    include_once 'Helios/src/visualisation.php';
}
?>
<script src="Helios/scripts/form.js"></script>
</body>
</html>