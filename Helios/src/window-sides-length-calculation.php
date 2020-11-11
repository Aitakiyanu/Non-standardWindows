<?php
namespace Helios;

include_once 'WindowSide.php';

$windowSides = [];
for ($i = 1, $sides = count($intersections); $i <= $sides; $i++) {
    $end = $i === $sides ? 1 : $i + 1;
    $windowSides[$i] = new WindowSide($intersections[$i]->intersectionPointX,
        $intersections[$i]->intersectionPointY,
        $intersections[$end]->intersectionPointX,
        $intersections[$end]->intersectionPointY);
}
$sidesLength = 'Стороны, начиная со стороны '.($strLines[1] + 1).': '; //Проверить номер стороны
foreach ($windowSides as $side) {
    $sidesLength .= $side->sideLength . ', ';
}
echo substr($sidesLength, 0, -2);
