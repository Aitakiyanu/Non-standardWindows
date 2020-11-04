<?php

class WallOpeningSide
{
    public int $sideNumber;
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
    public function __construct($sideNumber, $sideLength, $sideWidth, $sideHeight, $sideSeam, $previousEndX, $previousEndY)
    {
        $this->sideNumber = $sideNumber;
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
    }
}
