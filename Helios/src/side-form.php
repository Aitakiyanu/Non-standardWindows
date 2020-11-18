<?php //Начнем слева
namespace Helios;


include_once 'wall-opening-sides-array.php';

if (isset($sidesCount)) {
    echo $sidesCount;
} else {
    $sidesCount = 8;
}

for ($i = 1; $i <= $sidesCount; $i++) {
    $negateChecked = $_POST["negate_assembly_seam_{$i}"] ?? "";
    if (isset($_POST["left_or_right_{$i}"])) {
        $rightChecked = ($_POST["left_or_right_{$i}"] > 0) ? "checked" : "";
        $leftChecked = ($_POST["left_or_right_{$i}"] < 0) ? "checked" : "";
    } else {
        $rightChecked = "checked";
        $leftChecked = "";
    }
    if (isset($_POST["up_or_down_{$i}"])) {
        $upChecked = ($_POST["up_or_down_{$i}"] > 0) ? "checked" : "";
        $downChecked = ($_POST["up_or_down_{$i}"] < 0) ? "checked" : "";
    } else {
        $upChecked = "checked";
        $downChecked = "";
    }
    echo <<<SIDEFORM
<fieldset id="side_form_{$i}" class="side_form">
    <legend class="side_form_legend" data-type="legend">Сторона $i</legend>
    <span id="side_{$i}" hidden>{$wallOpeningSides[$i]->sideLength}</span>
    
    <label for="wall_opening_side_length_{$i}">Длина стороны:</label>
    <input id="wall_opening_side_length_{$i}" type="number" name="wall_opening_side_length_{$i}" value="{$wallOpeningSides[$i]->sideLength}" min="0" required>
     
    <input type="button" id="add_side_{$i}" value="Добавить после" data-type="addside"/>
    <input type="button" id="remove_side_{$i}" value="Убрать сторону" data-type="removeside"/><br/>
   
    <label for="wall_opening_side_width_{$i}">Ширина по горизонтали:</label>
    <input type="number" id="wall_opening_side_width_{$i}" name="wall_opening_side_width_{$i}" value="{$wallOpeningSides[$i]->sideWidth}" required>
    
    <label for="right_direction_{$i}">вправо(+)</label>
    <input id="right_direction_{$i}" type="radio" name="left_or_right_{$i}" value="1" required {$rightChecked}>
    
    <label for="left_direction_{$i}">влево(-)</label>
    <input id="left_direction_{$i}" type="radio" name="left_or_right_{$i}" value="-1" required {$leftChecked}><br/>
    
    <label for="wall_opening_side_height_{$i}">Высота по вертикали:</label>
    <input type="number" id="wall_opening_side_height_{$i}" name="wall_opening_side_height_{$i}" value="{$wallOpeningSides[$i]->sideHeight}" required>
    
    <label for="up_direction_{$i}">вверх(+)</label>
    <input id="up_direction_{$i}" type="radio" name="up_or_down_{$i}" value="1" required {$upChecked}>
    
    <label for="down_direction_{$i}">вниз(-)</label>
    <input id="down_direction_{$i}" type="radio" name="up_or_down_{$i}" value="-1" required {$downChecked}><br/>
    
    <label for="side_assembly_seam_{$i}">Шов:</label>
    <input id="side_assembly_seam_{$i}" type="number" name="side_assembly_seam_{$i}" value="{$wallOpeningSides[$i]->sideSeam}" min="0" required>
    
    <label for="negate_assembly_seam_{$i}">Или это заход за четверть?</label>
    <input id="negate_assembly_seam_{$i}" type="checkbox" name="negate_assembly_seam_{$i}" value="checked" {$negateChecked}>
    
</fieldset>
SIDEFORM;
}
