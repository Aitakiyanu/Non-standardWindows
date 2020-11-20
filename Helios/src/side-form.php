<?php //Начнем слева
namespace Helios;

if (isset($sidesCount)) {
    for ($i = 1; $i <= $sidesCount; $i++) {
        $windowSideLength = 0;
        if (isset($windowSides)) {
            $windowSideLength = $windowSides[$i-1]->sideLength;
        }

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
                <span id="side_{$i}" hidden>{$_POST["wall_opening_side_length_{$i}"]} => {$windowSideLength}</span>
                
                <label for="wall_opening_side_length_{$i}">Длина стороны:</label>
                <input id="wall_opening_side_length_{$i}" type="number" name="wall_opening_side_length_{$i}" value="{$_POST["wall_opening_side_length_{$i}"]}" min="0" required class="side_dimension length">
                 
                <input type="button" id="add_side_{$i}" value="Добавить после" data-type="addside"/>
                <input type="button" id="remove_side_{$i}" value="Убрать сторону" data-type="removeside"/><br/>
               
                <label for="wall_opening_side_width_{$i}">Ширина по горизонтали:</label>
                <input type="number" id="wall_opening_side_width_{$i}" name="wall_opening_side_width_{$i}" value="{$_POST["wall_opening_side_width_{$i}"]}" required class="side_dimension width">
                
                <label for="right_direction_{$i}">вправо(+)</label>
                <input id="right_direction_{$i}" type="radio" name="left_or_right_{$i}" value="1" required {$rightChecked}>
                
                <label for="left_direction_{$i}">влево(-)</label>
                <input id="left_direction_{$i}" type="radio" name="left_or_right_{$i}" value="-1" required {$leftChecked}><br/>
                
                <label for="wall_opening_side_height_{$i}">Высота по вертикали:</label>
                <input type="number" id="wall_opening_side_height_{$i}" name="wall_opening_side_height_{$i}" value="{$_POST["wall_opening_side_height_{$i}"]}" required class="side_dimension height">
                
                <label for="up_direction_{$i}">вверх(+)</label>
                <input id="up_direction_{$i}" type="radio" name="up_or_down_{$i}" value="1" required {$upChecked}>
                
                <label for="down_direction_{$i}">вниз(-)</label>
                <input id="down_direction_{$i}" type="radio" name="up_or_down_{$i}" value="-1" required {$downChecked}><br/>
                
                <label for="side_assembly_seam_{$i}">Шов:</label>
                <input id="side_assembly_seam_{$i}" type="number" name="side_assembly_seam_{$i}" value="{$_POST["side_assembly_seam_{$i}"]}" min="0" required>
                
                <label for="negate_assembly_seam_{$i}">Или это заход за четверть?</label>
                <input id="negate_assembly_seam_{$i}" type="checkbox" name="negate_assembly_seam_{$i}" value="checked" {$negateChecked}>
                
            </fieldset>
SIDEFORM;
    }
}
