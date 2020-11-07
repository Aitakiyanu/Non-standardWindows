<?php

class IntersectionPoint
{
    public float $intersectionPointX;
    public float $intersectionPointY;
    public function __construct($coefficientA1, $coefficientB1, $coefficientC1, $coefficientA2, $coefficientB2, $coefficientC2)
    {
        if ($coefficientA1 == 0) {
            if ($coefficientB2 == 0) {
                $this->intersectionPointX = - $coefficientC2 / $coefficientA2;
                $this->intersectionPointY = - $coefficientC1 / $coefficientB1;
            } else {
                $this->intersectionPointY = - $coefficientC1 / $coefficientB1;
                $this->intersectionPointX = - ($coefficientB2 * $this->intersectionPointY + $coefficientC2) / $coefficientA2;
            }
        } else {
            if ($coefficientB2 == 0) {
                $this->intersectionPointX = - $coefficientC2 / $coefficientA2;
                $this->intersectionPointY = - ($coefficientA1 * $this->intersectionPointX + $coefficientC1) / $coefficientB1;
            } else {
                $this->intersectionPointX = ($coefficientC2 * $coefficientB1 - $coefficientC1 * $coefficientB2) / ($coefficientA1 * $coefficientB2 - $coefficientA2 * $coefficientB1);
                $this->intersectionPointY = - ($coefficientA2 * $this->intersectionPointX + $coefficientC2) / $coefficientB2;
            }
        }
    }
}