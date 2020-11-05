<?php
function calculateSlopingSideHeightDifference(int $width, int $height, int $bottomLenght, int $seamWidth) {
    $triangleArea = $width * $height / 2;
    $triangleHeight = $triangleArea / $bottomLenght;
    $newTriangleHeight = $triangleHeight + $seamWidth;
    $similarityСoefficient = $newTriangleHeight / $triangleHeight;
    $newHeight = $height * $similarityСoefficient;
    $heightDifference = $newHeight - $height;
    return $heightDifference;
}
$windowSidesArray = [];