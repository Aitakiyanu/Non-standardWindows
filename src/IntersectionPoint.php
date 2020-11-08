<?php

class IntersectionPoint
{
    public float $intersectionPointX;
    public float $intersectionPointY;
    public function __construct($coefficientA1, $coefficientB1, $coefficientC1, $coefficientA2, $coefficientB2, $coefficientC2)
    {
        if ($coefficientA1 == 0) { //Первая прямая - горизонтальная (A = y1 - y2)
            if ($coefficientB2 == 0) { //Вторая прямая - вертикальная (B = x2 - x1)
                $this->intersectionPointX = - $coefficientC2 / $coefficientA2;
                $this->intersectionPointY = - $coefficientC1 / $coefficientB1;
            } else { //Вторая прямая - наклонная
                $this->intersectionPointY = - $coefficientC1 / $coefficientB1;
                $this->intersectionPointX = - ($coefficientB2 * $this->intersectionPointY + $coefficientC2) / $coefficientA2;
            }
        } elseif ($coefficientB1 == 0) { //Первая прямая - вертикальная
            if ($coefficientA2 == 0) { //Вторая прямая - горизонтальная
                $this->intersectionPointX = - $coefficientC1 / $coefficientA1;
                $this->intersectionPointY = - $coefficientC2 / $coefficientB2;
            } else { //Вторая прямая - наклонная
                $this->intersectionPointX = - $coefficientC1 / $coefficientA1;
                $this->intersectionPointY = - ($coefficientA2 * $this->intersectionPointX + $coefficientC2) / $coefficientB2;
            }
        } else { //Первая прямая - наклонная
            if ($coefficientB2 == 0) { //Вторая прямая - вертикальная
                $this->intersectionPointX = -$coefficientC2 / $coefficientA2;
                $this->intersectionPointY = -($coefficientA1 * $this->intersectionPointX + $coefficientC1) / $coefficientB1;
            } elseif ($coefficientA2 == 0) { //Вторая прямая - горизонтальная
                $this->intersectionPointY = - $coefficientC2 / $coefficientB2;
                $this->intersectionPointX = - ($coefficientB1 * $this->intersectionPointY + $coefficientC1) / $coefficientA1;
            } else { //Вторая прямая - наклонная
                $this->intersectionPointX = ($coefficientC2 * $coefficientB1 - $coefficientC1 * $coefficientB2) / ($coefficientA1 * $coefficientB2 - $coefficientA2 * $coefficientB1);
                $this->intersectionPointY = - ($coefficientA2 * $this->intersectionPointX + $coefficientC2) / $coefficientB2;
            }
        }
    }
}