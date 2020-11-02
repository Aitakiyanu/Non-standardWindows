<?php

class PolygonSide
{
    public int $sideNumber;
    public int $sideLength;
    public int $sideWidth;
    public int $sideHeight;
    public int $sideSeam;
    public float $startX;
    public float $startY;
    public float $endX;
    public float $endY;
    public float $coefficientA; //коэффициент A в функции прямой Ax+By+C=0
    public float $coefficientB; //коэффициент B в функции прямой Ax+By+C=0
    public float $coefficientC; //коэффициент C в функции прямой Ax+By+C=0
    public function __construct($sideNumber, $sideLength, $sideWidth, $sideHeight, $sideSeam, $previousEndX, $previousEndY)
    {
        $this->sideNumber = $sideNumber;
        $this->sideLength = $sideLength;
        $this->sideWidth = $sideWidth;
        $this->sideHeight = $sideHeight;
        $this->sideSeam = $sideSeam;
        $this->startX = $this->sideNumber == 0 ? $this->sideWidth : $previousEndX;
        $this->startY = $previousEndY;
        $this->endX = $this->sideNumber == 0 ? $this->startX + $sideWidth : 0;
        $this->endY = $previousEndY + $sideHeight;
        $this->coefficientA = $this->startY - $this->endY;
        $this->coefficientB = $this->endX - $this->startX;
        $this->coefficientC = $this->startX * $this->endY - $this->endX * $this->startY;
    }
}
