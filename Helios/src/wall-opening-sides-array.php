<?php
namespace Helios;

include_once 'WallOpeningSide.php';

$wallOpeningSides = [];

if (count($_POST) > 0) {
    $sidesCount = 0;
    while (isset($_POST["remove_side_{$sidesCount}"])) $sidesCount++;
        for ($i = 1; $i <= $sidesCount; $i++) {
            $seamSign = isset($_POST["negate_assembly_seam_{$i}"]) ? -1 : 1;
            $prvSide = ($i === 1 ? $sidesCount : $i) - 1;
            $prvSideX = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endX : 0;
            $prvSideY = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endY : 0;
            $wallOpeningSides[$i] = new WallOpeningSide($_POST["wall_opening_side_length_{$i}"],
                $_POST["wall_opening_side_width_{$i}"],
                $_POST["wall_opening_side_height_{$i}"],
                $seamSign * $_POST["side_assembly_seam_{$i}"],
                $prvSideX,
                $prvSideY);
        }
    }
