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
    include_once 'src/WallOpeningSide.php';
    include_once 'src/Wall-Opening-Sides-Array.php';
}
//if (isset($wallOpeningSides)) var_dump($wallOpeningSides);
/*
if (isset($wallOpeningSides)) {
//    echo " A    B    C<br/>";
    foreach ($wallOpeningSides as $key => $value) {
        echo $key.': '.$value->coefficientA.' => '.$value->newCoefficientA.' ||| '.$value->coefficientB.' => '.$value->newCoefficientB.' ||| '.$value->coefficientC.' => '.$value->newCoefficientC.'<br/>';
//        var_dump($value);
//        echo '<br/>';
    }
}
*/
?>
</body>
</html>