<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Размеры окна</title>
</head>
<body>
<?php
$wob = $_POST["wall_opening_bottom"]; //нижний край проема
$wobl = $_POST["wall_opening_bottom_to_left"]; //нижний левый край проема
$woblw = $_POST["wall_opening_bottom_to_left_width"]; //ширина нижнего левого края проема
$woblh = $_POST["wall_opening_bottom_to_left_height"]; //высота нижнего левого края проема
$wol = $_POST["wall_opening_left"]; //левый край проема
$wolt = $_POST["wall_opening_left_to_top"]; //левый верхний край проема
$woltw = $_POST["wall_opening_left_to_top_width"]; //ширина левого верхнего края проема
$wolth = $_POST["wall_opening_left_to_top_height"]; //высота левого верхнего края проема
$wot = $_POST["wall_opening_top"]; //верхний край проема
$wotr = $_POST["wall_opening_top_to_right"]; //правый верхний край проема
$wotrw = $_POST["wall_opening_top_to_right_width"]; //ширина правого верхнего края проема
$wotrh = $_POST["wall_opening_top_to_right_height"]; //высота правого верхнего края проема
$wor = $_POST["wall_opening_right"]; //правый край проема
$worb = $_POST["wall_opening_right_to_bottom"]; //правый нижний край проема
$worbw = $_POST["wall_opening_right_to_bottom_width"]; //ширина правого нижнего края проема
$worbh = $_POST["wall_opening_right_to_bottom_height"]; //высота правого нижнего края проема
$bas = isset($_POST["negate_bottom_assembly_seam"]) ? $_POST["bottom_assembly_seam"] : -$_POST["bottom_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) снизу
$blas = isset($_POST["negate_bottom_to_left_assembly_seam"]) ? $_POST["bottom_to_left_assembly_seam"] : -$_POST["bottom_to_left_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) снизу слева
$las = isset($_POST["negate_left_assembly_seam"]) ? $_POST["left_assembly_seam"] : -$_POST["left_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) слева
$ltas = isset($_POST["negate_left_to_top_assembly_seam"]) ? $_POST["left_to_top_assembly_seam"] : -$_POST["left_to_top_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) слева сверху
$tas = isset($_POST["negate_top_assembly_seam"]) ? $_POST["top_assembly_seam"] : -$_POST["top_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) сверху
$tras = isset($_POST["negate_top_to_right_assembly_seam"]) ? $_POST["top_to_right_assembly_seam"] : -$_POST["top_to_right_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) сверху справа
$ras = isset($_POST["negate_right_assembly_seam"]) ? $_POST["right_assembly_seam"] : -$_POST["right_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) справа
$rbas = isset($_POST["negate_right_to_bottom_assembly_seam"]) ? $_POST["right_to_bottom_assembly_seam"] : -$_POST["right_to_bottom_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) справа снизу
//Вычисляем коэффициенты k и b для уравнений прямой вида y=kx+b

?>

</body>
</html>