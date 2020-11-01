<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Размеры окна</title>
</head>
<body>
<?php
$hsize = $_POST["wall_opening_width"] - $_POST["assembly_seam"] * 2;
$vsize = $_POST["wall_opening_height"] - $_POST["assembly_seam"] - $_POST["bottom_assembly_seam"];
$rect_size = max($_POST["wall_opening_width"], $_POST["wall_opening_height"]);
if ($_POST["assembly_seam"] < 0 || $_POST["bottom_assembly_seam"] < 0) {
    $rect_size = $rect_size + max(abs($_POST["assembly_seam"]), abs($_POST["bottom_assembly_seam"]));
}
?>
<h3 style="color: red"><u>Размеры проема</u></h3>
<p>Ширина проема: <?php echo $_POST["wall_opening_width"]; ?> мм</p>
<p>Высота проема: <?php echo $_POST["wall_opening_height"]; ?> мм</p>
<h3 style="color: blue"><u>Размеры окна</u></h3>
<p>Ширина окна: <?php echo $hsize; ?> мм</p>
<p>Высота окна: <?php echo $vsize; ?> мм</p>
<h3><u>Визуализация</u></h3>
<svg width="200" height="200"
     viewBox="0 0 <?php echo $rect_size + max(abs($_POST["assembly_seam"]), abs($_POST["bottom_assembly_seam"]));?> <?php echo $rect_size + 20;?>"
     xmlns="http://www.w3.org/2000/svg">
    <!-- Рисуем проем -->
    <rect x="<?php echo max(10,-$_POST["assembly_seam"]+2);?>" y="<?php echo max(10,-$_POST["assembly_seam"]+2);?>" width="<?php echo $_POST["wall_opening_width"];?>" height="<?php echo $_POST["wall_opening_height"];?>" stroke="red" stroke-width="0.1%" fill="none"></rect>
    <!-- Рисуем окно -->
    <rect x="<?php echo $_POST["assembly_seam"] + max(10,-$_POST["assembly_seam"]+2);?>" y="<?php echo $_POST["assembly_seam"] + max(10,-$_POST["assembly_seam"]+2);?>" width="<?php echo $hsize;?>" height="<?php echo $vsize;?>" stroke="blue" stroke-width="0.1%" fill="none"></rect>

</svg>
</body>
</html>