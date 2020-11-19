<?php
namespace Helios;

include_once 'WindowSide.php';

$windowSides = [];
if (!empty($intersections)) {
    for ($i = 0, $sides = count($intersections); $i < $sides; $i++) {
        $end = $i === ($sides - 1) ? 0 : $i + 1;
        $windowSides[$i] = new WindowSide($intersections[$i]->intersectionPointX,
            $intersections[$i]->intersectionPointY,
            $intersections[$end]->intersectionPointX,
            $intersections[$end]->intersectionPointY);
    }
}
if (isset($strLinesCount) && ($strLinesCount > 1) && !empty($strLines)) {
            $sidesLength = 'Стороны, окна: ';
        }
//Проверить номер стороны
foreach ($windowSides as $side) {
    if (isset($sidesLength)) {
        $sidesLength .= $side->sideLength . ', ';
    }
}
if (isset($sidesLength)) {
    echo substr($sidesLength, 0, -2);
}
