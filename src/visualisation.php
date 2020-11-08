<?php
$viewBoxWidth = 0; //Подбор ширины svg viewBox по максимальной координате X минус минимальная координата X
$viewBoxHeight = 0; //Подбор высоты svg viewBox по максимальной координате Y минус минимальная координата Y
$viewBoxMinX = 0; //Минимальная координата X (min-X) подбирается по минимальной координате X точек
$minY = 0; //Вспомогательная переменная для расчета высоты svg viewBox, определяющая минимальную координату Y точек
$wallOpeningPoints = '';
$windowPoints = '';

foreach ($wallOpeningSides as $side) {
    if ($side->endX > $viewBoxWidth) $viewBoxWidth = $side->endX;
    if ($side->endY > $viewBoxHeight) $viewBoxHeight = $side->endY;
    if ($side->endX < $viewBoxMinX) $viewBoxMinX = $side->endX;
    if ($side->endY < $minY) $minY = $side->endY;
}
foreach ($intersections as $point) {
    if ($point->intersectionPointX > $viewBoxWidth) $viewBoxWidth = $point->intersectionPointX;
    if ($point->intersectionPointY > $viewBoxHeight) $viewBoxHeight = $point->intersectionPointY;
    if ($point->intersectionPointX < $viewBoxMinX) $viewBoxMinX = $point->intersectionPointX;
    if ($point->intersectionPointY < $minY) $minY = $point->intersectionPointY;
}
echo '<br/>';

$viewBoxMinX -= 10;
$minY -= 10;
//Координаты внутри svg
$viewBoxWidth += (10 - $viewBoxMinX);
$viewBoxHeight += (10 - $minY);
//Размер svg внутри окна пропорционально внутренним координатам
$svgViewPortSizesRatio = $viewBoxHeight / $viewBoxWidth;
$svgWidth = 500;
$svgHeight = (int)round($svgWidth * $svgViewPortSizesRatio);

foreach ($wallOpeningSides as $side) {
    $wallOpeningPoints .= (int)round($side->endX) . ',' . (int)round($viewBoxHeight + $minY - $side->endY) . ' ';
}
$wallOpeningPoints = substr($wallOpeningPoints, 0, -1);
foreach ($intersections as $point) {
    $windowPoints .= (int)round($point->intersectionPointX) . ',' . (int)round($viewBoxHeight + $minY - $point->intersectionPointY) . ' ';
}
$windowPoints = substr($windowPoints, 0, -1);

echo <<<SVG
<div>
    <svg width="$svgWidth" height="$svgHeight"
         viewBox="$viewBoxMinX 0 $viewBoxWidth $viewBoxHeight"
         xmlns="http://www.w3.org/2000/svg">
        <!-- Рисуем проем -->
        <polygon points="$wallOpeningPoints" fill="none" stroke="red"/>
        <!-- Рисуем окно -->
        <polygon points="$windowPoints" fill="none" stroke="blue"/>
    </svg>
</div>
SVG;

