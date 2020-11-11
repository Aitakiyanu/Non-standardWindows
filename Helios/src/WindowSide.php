<?php
namespace Helios;

class WindowSide
{
    public float $sideWidth;
    public float $sideHeight;
    public int $sideLength;
    public function __construct($startX, $startY, $endX, $endY)
    {
        $this->sideWidth = $endX - $startX;
        $this->sideHeight = $endY - $startY;
        $this->sideLength = (int) round(sqrt(($this->sideWidth ** 2) + ($this->sideHeight ** 2)));
    }
}