<?php //Начнем слева
namespace Helios;

if (isset($wallOpeningSides)) {
    echo "Сейчас посчитаю...";
    $sidesCount = count($wallOpeningSides);
    echo "Посчитал!";
} else {
    $sidesCount = 8;
    $wallOpeningSides = [];
}

include_once 'wall-opening-sides-array.php';

for ($i = 1; $i <= $sidesCount; $i++) {
    $negateChecked = $_POST["negate_assembly_seam_{$i}"] ?? "";
    echo <<<SIDEFORM
<fieldset id="side_form_{$i}" class="side_form">
    <legend class="side_form_legend" data-type="legend">Сторона $i</legend>
    <p id="side_{$i}" hidden>{$wallOpeningSides[$i]->sideLength}</p>
    <label for="wall_opening_side_length_{$i}">Длина стороны:</label>
    <input id="wall_opening_side_length_{$i}" type="number" name="wall_opening_side_length_{$i}" value="{$wallOpeningSides[$i]->sideLength}" min="0" required><br/><br/>
    <label for="wall_opening_side_width_{$i}">Ширина по горизонтали:</label>
    <input type="number" id="wall_opening_side_width_{$i}" name="wall_opening_side_width_{$i}" value="{$wallOpeningSides[$i]->sideWidth}" required>
    <label for="wall_opening_side_height_{$i}">высота по вертикали:</label>
    <input type="number" id="wall_opening_side_height_{$i}" name="wall_opening_side_height_{$i}" value="{$wallOpeningSides[$i]->sideHeight}" required><br/><br/>
    <label for="side_assembly_seam_{$i}">Шов:</label>
    <input id="side_assembly_seam_{$i}" type="number" name="side_assembly_seam_{$i}" value="{$wallOpeningSides[$i]->sideSeam}" min="0" required>
    <label for="negate_assembly_seam_{$i}">Или это заход за четверть?</label>
    <input id="negate_assembly_seam_{$i}" type="checkbox" name="negate_assembly_seam_{$i}" value="checked" {$negateChecked}>
    <input type="button" id="add_side_{$i}" value="Добавить сторону" data-type="addside"/>
    <input type="button" id="remove_side_{$i}" value="Убрать сторону" data-type="removeside"/>

</fieldset>
SIDEFORM;
}
