<?php

include_once 'src/IntersectionPoint.php';

$intersections = [];
$strLines = [];
$i = 0;

foreach ($wallOpeningSides as $number => $side) {
    if ($side->newCoefficientC <> 0) {
        $strLines[$i] = $number;
        $i++;
    }
}

if (count($strLines)>2) {
    for ($i = 0, $size = count($strLines); $i < $size; $i++) {
        $firstStrLine = $strLines[$i];
        $secondStrLine = ($i == $size - 1) ? $strLines[0] : $strLines[$i + 1];
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