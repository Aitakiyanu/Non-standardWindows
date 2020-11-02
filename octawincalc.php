<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Размеры окна</title>
</head>
<body>
<?php
$wob = (int)$_POST["wall_opening_bottom"]; //нижний край проема
$wobl = (int)$_POST["wall_opening_bottom_to_left"]; //нижний левый край проема
$woblw = (int)$_POST["wall_opening_bottom_to_left_width"]; //ширина нижнего левого края проема
$woblh = (int)$_POST["wall_opening_bottom_to_left_height"]; //высота нижнего левого края проема
$wol = (int)$_POST["wall_opening_left"]; //левый край проема
$wolt = (int)$_POST["wall_opening_left_to_top"]; //левый верхний край проема
$woltw = (int)$_POST["wall_opening_left_to_top_width"]; //ширина левого верхнего края проема
$wolth = (int)$_POST["wall_opening_left_to_top_height"]; //высота левого верхнего края проема
$wot = (int)$_POST["wall_opening_top"]; //верхний край проема
$wotr = (int)$_POST["wall_opening_top_to_right"]; //правый верхний край проема
$wotrw = (int)$_POST["wall_opening_top_to_right_width"]; //ширина правого верхнего края проема
$wotrh = (int)$_POST["wall_opening_top_to_right_height"]; //высота правого верхнего края проема
$wor = (int)$_POST["wall_opening_right"]; //правый край проема
$worb = (int)$_POST["wall_opening_right_to_bottom"]; //правый нижний край проема
$worbw = (int)$_POST["wall_opening_right_to_bottom_width"]; //ширина правого нижнего края проема
$worbh = (int)$_POST["wall_opening_right_to_bottom_height"]; //высота правого нижнего края проема
$bas = isset($_POST["negate_bottom_assembly_seam"]) ? (int)$_POST["bottom_assembly_seam"] : -(int)$_POST["bottom_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) снизу
$blas = isset($_POST["negate_bottom_to_left_assembly_seam"]) ? (int)$_POST["bottom_to_left_assembly_seam"] : -(int)$_POST["bottom_to_left_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) снизу слева
$las = isset($_POST["negate_left_assembly_seam"]) ? (int)$_POST["left_assembly_seam"] : -(int)$_POST["left_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) слева
$ltas = isset($_POST["negate_left_to_top_assembly_seam"]) ? (int)$_POST["left_to_top_assembly_seam"] : -(int)$_POST["left_to_top_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) слева сверху
$tas = isset($_POST["negate_top_assembly_seam"]) ? (int)$_POST["top_assembly_seam"] : -(int)$_POST["top_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) сверху
$tras = isset($_POST["negate_top_to_right_assembly_seam"]) ? (int)$_POST["top_to_right_assembly_seam"] : -(int)$_POST["top_to_right_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) сверху справа
$ras = isset($_POST["negate_right_assembly_seam"]) ? (int)$_POST["right_assembly_seam"] : -(int)$_POST["right_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) справа
$rbas = isset($_POST["negate_right_to_bottom_assembly_seam"]) ? (int)$_POST["right_to_bottom_assembly_seam"] : -(int)$_POST["right_to_bottom_assembly_seam"]; //монтажный шов (-) либо заход за четверть (+) справа снизу
//Вычисляем массив точек, начиная с левой точки по нижнему краю восьмиугольника (wall opening points)
$wopoints = [[$woblw, 0], [0, $woblh], [0, $woblh + $wol], [$woltw, $woblh + $wol + $wolth], [$woltw + $wot, $worbh + $wor + $wotrh], [$woltw + $wot + $wotrw, $worbh + $wor], [$woblw + $wob + $worbw, $worbh], [$woblw + $wob, 0]];
//вычисляем массив коэффициентов k и b для прямых вида y=kx+b, начиная с нижней горизонтальной прямой (wall opening straight lines coefficients)
$woslcoefs = [[]];

?>

</body>
</html>