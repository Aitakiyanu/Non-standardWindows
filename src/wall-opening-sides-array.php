<?php

include_once 'src/WallOpeningSide.php';

$wallOpeningSides = [];
$seamSign = isset($_POST['negate_bottom_to_left_assembly_seam']) ? -1 : 1;
$wallOpeningSides[0] = new WallOpeningSide($_POST['wall_opening_bottom_to_left'], -$_POST['wall_opening_bottom_to_left_width'], $_POST['wall_opening_bottom_to_left_height'], $seamSign * $_POST['bottom_to_left_assembly_seam'], $_POST['wall_opening_bottom_to_left_width'], 0);
$seamSign = isset($_POST['negate_left_assembly_seam']) ? -1 : 1;
$wallOpeningSides[1] = new WallOpeningSide($_POST['wall_opening_left'], 0, $_POST['wall_opening_left'], $seamSign * $_POST['left_assembly_seam'], $wallOpeningSides[0]->endX, $wallOpeningSides[0]->endY);
$seamSign = isset($_POST['negate_left_to_top_assembly_seam']) ? -1 : 1;
$wallOpeningSides[2] = new WallOpeningSide($_POST['wall_opening_left_to_top'], $_POST['wall_opening_left_to_top_width'], $_POST['wall_opening_left_to_top_height'], $seamSign * $_POST['left_to_top_assembly_seam'], $wallOpeningSides[1]->endX, $wallOpeningSides[1]->endY);
$seamSign = isset($_POST['negate_top_assembly_seam']) ? -1 : 1;
$wallOpeningSides[3] = new WallOpeningSide($_POST['wall_opening_top'], $_POST['wall_opening_top'], 0, $seamSign * $_POST['top_assembly_seam'], $wallOpeningSides[2]->endX, $wallOpeningSides[2]->endY);
$seamSign = isset($_POST['negate_top_to_right_assembly_seam']) ? -1 : 1;
$wallOpeningSides[4] = new WallOpeningSide($_POST['wall_opening_top_to_right'], $_POST['wall_opening_top_to_right_width'], -$_POST['wall_opening_top_to_right_height'], $seamSign * $_POST['top_to_right_assembly_seam'], $wallOpeningSides[3]->endX, $wallOpeningSides[3]->endY);
$seamSign = isset($_POST['negate_right_assembly_seam']) ? -1 : 1;
$wallOpeningSides[5] = new WallOpeningSide($_POST['wall_opening_right'], 0, -$_POST['wall_opening_right'], $seamSign * $_POST['right_assembly_seam'], $wallOpeningSides[4]->endX, $wallOpeningSides[4]->endY);
$seamSign = isset($_POST['negate_right_to_bottom_assembly_seam']) ? -1 : 1;
$wallOpeningSides[6] = new WallOpeningSide($_POST['wall_opening_right_to_bottom'], -$_POST['wall_opening_right_to_bottom_width'], -$_POST['wall_opening_right_to_bottom_height'], $seamSign * $_POST['right_to_bottom_assembly_seam'], $wallOpeningSides[5]->endX, $wallOpeningSides[5]->endY);
$seamSign = isset($_POST['negate_bottom_assembly_seam']) ? -1 : 1;
$wallOpeningSides[7] = new WallOpeningSide($_POST['wall_opening_bottom'], -$_POST['wall_opening_bottom'], 0, $seamSign * $_POST['bottom_assembly_seam'], $wallOpeningSides[6]->endX, $wallOpeningSides[6]->endY);
