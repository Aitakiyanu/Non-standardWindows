<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Размеры окна</title>
</head>
<body>
<?php
$hsize = $_GET["wall_opening_width"] - $_GET["assembly_seam"] * 2;
$vsize = $_GET["wall_opening_height"] - $_GET["assembly_seam"] - $_GET["bottom_assembly_seam"];
?>
<h3><u>Размеры проема</u></h3>
<p>Ширина проема: <?php echo $_GET["wall_opening_width"]; ?> мм</p>
<p>Высота проема: <?php echo $_GET["wall_opening_height"]; ?> мм</p>
<h3><u>Размеры окна</u></h3>
<p>Ширина окна: <?php echo $hsize; ?> мм</p>
<p>Высота окна: <?php echo $vsize; ?> мм</p>
</body>
</html>