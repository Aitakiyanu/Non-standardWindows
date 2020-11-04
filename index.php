<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Размеры окна</title>
    <style>
        input[type=number]{
            width: 50px;
        }
    </style>
</head>
<body>
<?php
include_once 'src/form.php';
if (count($_POST) > 0) {
    include_once 'src/PolygonSide.php';
    include_once 'src/array_filling.php';
    print_r($wallOpeningArray);
};
?>
</body>
</html>