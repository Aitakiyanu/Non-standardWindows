<?php
namespace Helios;

include_once 'WallOpeningSide.php';

$wallOpeningSides = [];
$sidesCount = 0;

if (count($_POST) > 0) {
    $sideToCount = 1;

    //Считаем количество сторон
    while (isset($_POST["wall_opening_side_length_{$sideToCount}"])) {
        $sidesCount++;
        $sideToCount++;
    }
    //Заполняем массив сторон проема объектами - сторонами
    for ($i = 1; $i <= $sidesCount; $i++) {
        $seamSign = isset($_POST["negate_assembly_seam_{$i}"]) ? -1 : 1; //Знак для вычисления монтажного шва либо захода за четверть
        $prvSide = ($i === 1 ? $sidesCount : $i) - 1; //-1 для перехода на индексы массива

        //Определяем координаты окончания предыдущей стороны для передачи в текущую в качестве начала. Первая сторона начинается в (0, 0)
        $prvSideX = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endX : 0;
        $prvSideY = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endY : 0;

        //Создаем в массиве очередной объект - сторону. Ширина и высота стороны с учетом напраления от предыдущей
        $wallOpeningSides[$i] = new WallOpeningSide($_POST["wall_opening_side_length_{$i}"],
            $_POST["wall_opening_side_width_{$i}"] * ($_POST["left_or_right_{$i}"] <=> 0),
            $_POST["wall_opening_side_height_{$i}"] * ($_POST["up_or_down_{$i}"] <=> 0),
            $seamSign * $_POST["side_assembly_seam_{$i}"],
            $prvSideX,
            $prvSideY);
    }
}
