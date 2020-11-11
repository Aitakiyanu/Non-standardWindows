<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Размеры окна</title>
    <link rel="stylesheet" href="styles/main.css" type="text/css"/>
</head>
<body>
<?php
include_once 'src/form.php';
if (count($_POST) > 0) {
    include_once 'src/intersections-calculation.php';
    include_once 'src/window-sides-length-calculation.php';
    include_once 'src/visualisation.php';
}
?>
<script src="scripts/form.js"></script>
</body>
</html>