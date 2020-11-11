<?php

include_once 'WallOpeningSide.php';

if (count($_POST) > 0) {
    for ($i = 1; $i <= $sidesCount; $i++) {
        $seamSign = isset($_POST["negate_assembly_seam_{$i}"]) ? -1 : 1;
        $prvSide = ($i == 1 ? $sidesCount : $i) - 1;
        $prvSideX = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endX : 0;
        $prvSideY = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endY : 0;
        $wallOpeningSides[$i] = new WallOpeningSide($_POST["wall_opening_side_length_{$i}"],
            $_POST["wall_opening_side_width_{$i}"],
            $_POST["wall_opening_side_height_{$i}"],
            $seamSign * $_POST["side_assembly_seam_{$i}"],
            $prvSideX,
            $prvSideY);
    }
} else {
    $wallOpeningSides[1] = new WallOpeningSide(500, -354, 354, 20, 354, 0);
    $wallOpeningSides[2] = new WallOpeningSide(500, 0, 500, 20, $wallOpeningSides[1]->endX, $wallOpeningSides[1]->endY);
    $wallOpeningSides[3] = new WallOpeningSide(500, 354, 354, 20, $wallOpeningSides[2]->endX, $wallOpeningSides[2]->endY);
    $wallOpeningSides[4] = new WallOpeningSide(500, 500, 0, 20, $wallOpeningSides[3]->endX, $wallOpeningSides[3]->endY);
    $wallOpeningSides[5] = new WallOpeningSide(500, 354, -354, 20, $wallOpeningSides[4]->endX, $wallOpeningSides[4]->endY);
    $wallOpeningSides[6] = new WallOpeningSide(500, 0, -500, 20, $wallOpeningSides[5]->endX, $wallOpeningSides[5]->endY);
    $wallOpeningSides[7] = new WallOpeningSide(500, -354, -354, 20, $wallOpeningSides[6]->endX, $wallOpeningSides[6]->endY);
    $wallOpeningSides[8] = new WallOpeningSide(500, -500, 0, 50, $wallOpeningSides[7]->endX, $wallOpeningSides[7]->endY);
}
