<?php
namespace Helios;

include_once 'IntersectionPoint.php';

if (isset($wallOpeningSides)) {
    $strLinesCount = 0; //Начальный индекс для заполнения массива номеров ненулевых сторон
    $strLines = []; //Вспомогательный массив номеров сторон, не равных нулю (заменить на ограничение ввода)
    foreach ($wallOpeningSides as $number => $side) {
        if ($side->newCoefficientC !== 0) {
            $strLines[$strLinesCount] = (int)$number;
            $strLinesCount++;
        }
    }
}

//Заполняем массив точек пересечения, исключая стороны нулевой длины, если сторон не меньше трех (треугольник)

if ($strLinesCount>2) {
    $intersections = []; //Массив точек пересечения
    for ($pointNumber = 0, $lastPointNumber = $strLinesCount - 1; $pointNumber < $strLinesCount; $pointNumber++) {
        $firstStrLine = $pointNumber === 0 ? $strLines[$lastPointNumber] : $strLines[$pointNumber - 1];
        $secondStrLine = $strLines[$pointNumber];
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
