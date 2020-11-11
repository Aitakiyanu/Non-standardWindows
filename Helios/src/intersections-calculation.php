<?php
namespace Helios;

include_once 'IntersectionPoint.php';

$intersections = [];
$strLines = [];
$i = 1;

if (isset($wallOpeningSides)) {
    foreach ($wallOpeningSides as $number => $side) {
        if ($side->newCoefficientC !== 0) {
            $strLines[$i] = (int)$number;
            $i++;
        }
    }
}

if (count($strLines)>2) {
    for ($i = 1, $points = count($strLines); $i <= $points; $i++) {
        $firstStrLine = $strLines[$i];
        $secondStrLine = ($i === $points) ? $strLines[1] : $strLines[$i + 1];
        $intersections[$i] = new IntersectionPoint($wallOpeningSides[$firstStrLine]->newCoefficientA,
            $wallOpeningSides[$firstStrLine]->newCoefficientB,
            $wallOpeningSides[$firstStrLine]->newCoefficientC,
            $wallOpeningSides[$secondStrLine]->newCoefficientA,
            $wallOpeningSides[$secondStrLine]->newCoefficientB,
            $wallOpeningSides[$secondStrLine]->newCoefficientC);
    }
} else {
    echo 'Сторон должно быть больше двух';
}