<?php //Начнем слева

if (isset($wallOpeningSides)) {
    $sidesCount = count($wallOpeningSides);
} else {
    $sidesCount = 8;
    $wallOpeningSides = [];
}
for ($i = 1; $i <= $sidesCount; $i++) {

    echo <<<SIDEFORM
<fieldset>
    <legend>Сторона $i</legend>
    <label for="wall_opening_side_length_{$i}">Длина стороны:</label>
    <input id="wall_opening_side_length_{$i}" type="number" name="wall_opening_side_length_{$i}" value="500" min="0" required><br/><br/>
    <label for="wall_opening_side_width_{$i}">Ширина по горизонтали:</label>
    <input type="number" id="wall_opening_side_width_{$i}" name="wall_opening_side_width_{$i}" value="500" min="0" required>
    <label for="wall_opening_side_height_{$i}">высота по вертикали:</label>
    <input type="number" id="wall_opening_side_height_{$i}" name="wall_opening_side_height_{$i}" value="500" min="0" required><br/><br/>
    <label for="side_assembly_seam_{$i}">Шов:</label>
    <input id="side_assembly_seam_{$i}" type="number" name="side_assembly_seam_{$i}" value="500" min="0" required>
    <label for="negate_assembly_seam_{$i}">Или это заход за четверть?</label>
    <input id="negate_assembly_seam_{$i}" type="checkbox" name="negate_assembly_seam_{$i}" value="checked">
</fieldset>
SIDEFORM;
}
