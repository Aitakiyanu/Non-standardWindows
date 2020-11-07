<?php
$intersections = [];
$strLines = [];
$i = 0;

foreach ($wallOpeningSides as $key => $item) {
    if ($item->newCoefficientC <> 0) {
        $strLines[$i] = $key;
        $i++;
    }
}

if (count($strLines)>2) {
    for ($i = 0, $size = count($strLines); $i < $size; $i++) {
        $firstStrLine = $strLines[$i];
        $secondStrLine = ($i == $size - 1) ? $strLines[0] : $strLines[$i + 1];

    }
} else {
    echo 'Сторон должно быть больше двух';
}