<?php

class WallOpeningSide
{
    public int $sideLength;
    public int $sideWidth;
    public int $sideHeight;
    public int $sideSeam;
    public int $startX;
    public int $startY;
    public int $endX;
    public int $endY;
    public int $coefficientA; //коэффициент A в функции прямой Ax+By+C=0
    public int $coefficientB; //коэффициент B в функции прямой Ax+By+C=0
    public int $coefficientC; //коэффициент C в функции прямой Ax+By+C=0
    public function __construct($sideLength, $sideWidth, $sideHeight, $sideSeam, $previousEndX, $previousEndY)
    {
        $this->sideLength = $sideLength;
        $this->sideWidth = $sideWidth;
        $this->sideHeight = $sideHeight;
        $this->sideSeam = $sideSeam;
        $this->startX = $previousEndX;
        $this->startY = $previousEndY;
        $this->endX = $this->startX + $sideWidth;
        $this->endY = $previousEndY + $sideHeight;
        $this->coefficientA = $this->startY - $this->endY;
        $this->coefficientB = $this->endX - $this->startX;
        $this->coefficientC = $this->startX * $this->endY - $this->endX * $this->startY;
        if ($this->sideWidth <> 0 && $this->sideHeight <> 0) {
            $triangleArea = abs($sideWidth * $sideHeight / 2);
            $triangleHeight = $triangleArea / $sideLength;
            $newTriangleHeight = $triangleHeight + $sideSeam;
            $similarityCoefficient = $newTriangleHeight / $triangleHeight;
            $newSideHeight = $sideHeight * $similarityCoefficient;
            $newSideWidth = $sideWidth * $similarityCoefficient;
            $heightDifference = abs($newSideHeight - $sideHeight);
            $widthDifference = abs($newSideWidth - $sideWidth);
            if ($this->sideWidth > 0) {
                if ($this->sideHeight >0) {
                    $auxiliaryStartX = $this->startX;
                    $auxiliaryStartY = $this->startY - $heightDifference;
                    $auxiliaryEndX = $this->endX + $widthDifference;
                    $auxiliaryEndY = $this->endY;
                } else {
                    $auxiliaryStartX = $this->startX - $widthDifference;
                    $auxiliaryStartY = $this->startY;
                    $auxiliaryEndX = $this->endX;
                    $auxiliaryEndY = $this->endY - $heightDifference;
                }
            } else {
                if ($this->sideHeight >0) {
                    $auxiliaryStartX = $this->startX + $widthDifference;
                    $auxiliaryStartY = $this->startY;
                    $auxiliaryEndX = $this->endX;
                    $auxiliaryEndY = $this->endY + $heightDifference;
                } else {
                    $auxiliaryStartX = $this->startX;
                    $auxiliaryStartY = $this->startY + $heightDifference;
                    $auxiliaryEndX = $this->endX + $widthDifference;
                    $auxiliaryEndY = $this->endY;
                }
            }
        }
    }
}
