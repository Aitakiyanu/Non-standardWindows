<?php
namespace Helios;

include_once 'IntersectionPoint.php';

$intersections = []; //Массив точек пересечения
$strLines = []; //Вспомогательный массив номеров сторон, не равных нулю (заменить на ограничение ввода)

$strLinesCount = 0; //Начальный индекс для заполнения массива номеров ненулевых сторон
if (isset($wallOpeningSides)) {
    foreach ($wallOpeningSides as $number => $side) {
        if ($side->newCoefficientC !== 0) {
            $strLines[$strLinesCount] = (int)$number;
            $strLinesCount++;
        }
    }
}

//Заполняем массив точек пересечения, исключая стороны нулевой длины, если сторон не меньше трех (треугольник)

if ($strLinesCount>2) {
    for ($pointNumber = 0, $lastPointNumber = $strLinesCount - 1; $pointNumber < $strLinesCount; $pointNumber++) {
        $firstStrLine = $strLines[$pointNumber];
        $secondStrLine = ($pointNumber === $lastPointNumber) ? $strLines[0] : $strLines[$pointNumber + 1];
        if (!empty($wallOpeningSides)) {
            $intersections[$pointNumber] = new IntersectionPoint($wallOpeningSides[$firstStrLine]->newCoefficientA,
                $wallOpeningSides[$firstStrLine]->newCoefficientB,
                $wallOpeningSides[$firstStrLine]->newCoefficientC,
                $wallOpeningSides[$secondStrLine]->newCoefficientA,
                $wallOpeningSides[$secondStrLine]->newCoefficientB,
                $wallOpeningSides[$secondStrLine]->newCoefficientC);
        }
    }
} else {
    echo 'Сторон должно быть больше двух';
}
