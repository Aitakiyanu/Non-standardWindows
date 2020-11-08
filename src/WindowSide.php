<?php

class WindowSide
{
    public $sideWidth;
    public $sideHeight;
    public $sideLength;
    public function __construct($startX, $startY, $endX, $endY)
    {
        $this->sideWidth = $endX - $startX;
        $this->sideHeight = $endY - $startY;
        $this->sideLength = (int) round(sqrt(pow($this->sideWidth,2) + pow($this->sideHeight,2)));
    }
}