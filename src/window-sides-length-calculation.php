<?php

include_once 'src/WindowSide.php';

$windowSides = [];
for ($i = 0, $size = count($intersections); $i < $size; $i++) {
    $end = $i === $size - 1 ? 0 : $i + 1;
    $windowSides[$i] = new WindowSide($intersections[$i]->intersectionPointX,
        $intersections[$i]->intersectionPointY,
        $intersections[$end]->intersectionPointX,
        $intersections[$end]->intersectionPointY);
}
$sidesLength = 'Стороны, начиная со стороны '.($strLines[0] + 2).': '; //Проверить номер стороны
foreach ($windowSides as $side) $sidesLength .= $side->sideLength.', ';
echo substr($sidesLength, 0, -2);
