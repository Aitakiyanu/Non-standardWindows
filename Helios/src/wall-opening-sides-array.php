<?php
namespace Helios;

include_once 'WallOpeningSide.php';

$wallOpeningSides = [];

//Считаем количество сторон
$sidesCount = count($data);

//Заполняем массив сторон проема объектами - сторонами
for ($i = 0; $i < $sidesCount; $i++) {
    $prvSide = $i === 0 ? $sidesCount : $i - 1; //Индекс предыдущей стороны

    //Определяем координаты окончания предыдущей стороны для передачи в текущую в качестве начала. Первая сторона начинается в (0, 0)
    $prvSideX = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endX : 0;
    $prvSideY = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endY : 0;

    //Создаем в массиве очередной объект - сторону
    $wallOpeningSides[$i] = new WallOpeningSide($data[$i][0], $data[$i][1], $data[$i][2], $data[$i][3], $prvSideX, $prvSideY);
}
