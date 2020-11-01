<?php

namespace src;


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
public function __construct()
{

}
}
