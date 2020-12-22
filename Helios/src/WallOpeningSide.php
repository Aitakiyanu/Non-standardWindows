<?php
namespace Helios;

class WallOpeningSide
{
    public $sideLength;
    public $sideWidth;
    public $sideHeight;
    public $sideSeam;
    public $startX;
    public $startY;
    public $endX;
    public $endY;
    public $coefficientA; //коэффициент A в функции прямой Ax+By+C=0
    public $coefficientB; //коэффициент B в функции прямой Ax+By+C=0
    public $coefficientC; //коэффициент C в функции прямой Ax+By+C=0
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
        if ($this->sideWidth === 0) { //Ширина равна нулю
            if ($this->sideHeight === 0) { //Ширина и высота равны нулю
                $this->auxiliaryStartX = $this->startX; //в этом случае
                $this->auxiliaryStartY = $this->startY; //все коэффициенты
                $this->auxiliaryEndX = $this->endX; //равны нулю
                $this->auxiliaryEndY = $this->endY; //новые координаты не имеют значения
            } else { //Вертикальная сторона (ширина равна нулю, высота не равна нулю)
                $this->auxiliaryStartY = $this->startY;
                $this->auxiliaryEndY = $this->endY;
                $this->auxiliaryStartX = $this->startX + ($this->sideHeight <=> 0) * $this->sideSeam;
                $this->auxiliaryEndX = $this->endX + ($this->sideHeight <=> 0) * $this->sideSeam;
            }
        } else if ($this->sideHeight === 0) { //Горизонтальная сторона (ширина не равна нулю, высота равна нулю)
            $this->auxiliaryStartX = $this->startX;
            $this->auxiliaryEndX = $this->endX;
            $this->auxiliaryStartY = $this->startY - ($this->sideWidth <=> 0) * $this->sideSeam;
            $this->auxiliaryEndY = $this->endY - ($this->sideWidth <=> 0) * $this->sideSeam;
        } else { //Наклонная сторона (ширина и высота не равны нулю)
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
        }
        $this->newCoefficientA = $this->auxiliaryStartY - $this->auxiliaryEndY;
        $this->newCoefficientB = $this->auxiliaryEndX - $this->auxiliaryStartX;
        $this->newCoefficientC = $this->auxiliaryStartX * $this->auxiliaryEndY - $this->auxiliaryEndX * $this->auxiliaryStartY;
    }
}

        /*if (($this->sideWidth !== 0) && ($this->sideHeight !== 0)) { //Наклонная сторона (не вертикальная и не горизонтальная)
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
            } else { //Конечная точка левее начальной (сторона строится справа-налево)
                if ($this->sideHeight > 0) { //Конечная точка выше начальной (сторона строится снизу-вверх справа-налево)
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
            }
        } else { //Сторона не наклонная (ширина либо высота равны нулю)
            if ($this->sideHeight !== 0) { //Вертикальная сторона (ширина равна нулю)
                $this->auxiliaryStartY = $this->startY;
                $this->auxiliaryEndY = $this->endY;
                $this->auxiliaryStartX = $this->startX + ($this->sideHeight <=> 0) * $this->sideSeam;
                $this->auxiliaryEndX = $this->endX + ($this->sideHeight <=> 0) * $this->sideSeam;
            } elseif ($this->sideWidth !== 0) { //Горизонтальная сторона (высота равна нулю)
                $this->auxiliaryStartX = $this->startX;
                $this->auxiliaryEndX = $this->endX;
                $this->auxiliaryStartY = $this->startY - ($this->sideWidth <=> 0) * $this->sideSeam;
                $this->auxiliaryEndY = $this->endY - ($this->sideWidth <=> 0) * $this->sideSeam;
            } else { //Ширина и высота равны нулю
                $this->auxiliaryStartX = $this->startX; //в этом случае
                $this->auxiliaryStartY = $this->startY; //все коэффициенты
                $this->auxiliaryEndX = $this->endX; //равны нулю
                $this->auxiliaryEndY = $this->endY; //новые координаты не имеют значения
            }
        }*/
