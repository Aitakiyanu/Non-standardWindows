<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Размеры окна</title>
    <style>
        input[type=number]{
            width: 50px;
        }
        fieldset{
            width: fit-content;
        }
    </style>
</head>
<body>
<?php
include_once 'src/form.php';
if (count($_POST) > 0) {
    include_once 'src/WallOpeningSide.php';
    include_once 'src/IntersectionPoint.php';
    include_once 'src/WindowSide.php';
    include_once 'src/Wall-Opening-Sides-Array.php';
    include_once 'src/intersections-calculation.php';
    include_once 'src/window-sides-length-calculation.php';
    include_once 'src/visualisation.php';
}
//if (isset($intersections)) var_dump($intersections);

/*if (isset($wallOpeningSides)) {
    foreach ($wallOpeningSides as $item) {
        echo ($item->auxiliaryStartX - $item->startX).'>>>'.($item->auxiliaryStartY - $item->startY).'<br/>';
    }
}*/

?>
</body>
</html>