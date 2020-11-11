<?php
namespace Helios;

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
    public $auxiliaryStartX;
    public $auxiliaryStartY;
    public $auxiliaryEndX;
    public $auxiliaryEndY;
    public $newCoefficientA;
    public $newCoefficientB;
    public $newCoefficientC;
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
        if (($this->sideWidth !== 0) && ($this->sideHeight !== 0)) { //Наклонная сторона (не вертикальная и не горизонтальная)
            $differenceCoefficient = ($sideSeam * $sideLength) / ($sideWidth * $sideHeight);
            $heightDifference = $sideHeight * $differenceCoefficient;
            $widthDifference = $sideWidth * $differenceCoefficient;
            if ($this->sideWidth > 0) { //Конечная точка правее начальной (сторона строится слева-направо)
                if ($this->sideHeight > 0) { //Конечная точка выше начальной (сторона строится снизу-вверх слева-направо)
                    $this->auxiliaryStartX = $this->startX;
                    $this->auxiliaryStartY = $this->startY - $heightDifference;
                    $this->auxiliaryEndX = $this->endX + $widthDifference;
                    $this->auxiliaryEndY = $this->endY;
                } else { //Конечная точка ниже начальной (сторона строится сверху-вниз слева-направо)
                    $this->auxiliaryStartX = $this->startX + $widthDifference;
                    $this->auxiliaryStartY = $this->startY;
                    $this->auxiliaryEndX = $this->endX;
                    $this->auxiliaryEndY = $this->endY - $heightDifference;
                }
            } else if ($this->sideHeight > 0) { //Конечная точка выше начальной (сторона строится снизу-вверх справа-налево)
                $this->auxiliaryStartX = $this->startX + $widthDifference;
                $this->auxiliaryStartY = $this->startY;
                $this->auxiliaryEndX = $this->endX;
                $this->auxiliaryEndY = $this->endY - $heightDifference;
            } else { //Конечная точка ниже начальной (сторона строится сверху-вниз справа-налево)
                $this->auxiliaryStartX = $this->startX;
                $this->auxiliaryStartY = $this->startY - $heightDifference;
                $this->auxiliaryEndX = $this->endX + $widthDifference;
                $this->auxiliaryEndY = $this->endY;
            }
        } elseif (($this->sideWidth === 0) && ($this->sideHeight !== 0)) { //Вертикальная сторона
            $this->auxiliaryStartY = $this->startY;
            $this->auxiliaryEndY = $this->endY;
            $this->auxiliaryStartX = $this->startX + ($this->sideHeight <=> 0) * $this->sideSeam;
            $this->auxiliaryEndX = $this->endX + ($this->sideHeight <=> 0) * $this->sideSeam;
        } elseif (($this->sideHeight === 0) && ($this->sideWidth !== 0)) { //Горизонтальная сторона
            $this->auxiliaryStartX = $this->startX;
            $this->auxiliaryEndX = $this->endX;
            $this->auxiliaryStartY = $this->startY - ($this->sideWidth <=> 0) * $this->sideSeam;
            $this->auxiliaryEndY = $this->endY - ($this->sideWidth <=> 0) * $this->sideSeam;
        } else {
            $this->auxiliaryStartX = $this->startX; //в этом случае
            $this->auxiliaryStartY = $this->startY; //все коэффициенты
            $this->auxiliaryEndX = $this->endX; //равны нулю
            $this->auxiliaryEndY = $this->endY; //новые координаты не имеют значения
        }
        $this->newCoefficientA = $this->auxiliaryStartY - $this->auxiliaryEndY;
        $this->newCoefficientB = $this->auxiliaryEndX - $this->auxiliaryStartX;
        $this->newCoefficientC = $this->auxiliaryStartX * $this->auxiliaryEndY - $this->auxiliaryEndX * $this->auxiliaryStartY;
    }
}
