<?php //Начнем с первой стороны, которая идет вверх и не влево
for ($i = 0, $size = isset($wallOpeningSides) ? count($wallOpeningSides) : 3; $i < $size; $i++) {
    echo <<<SIDEFORM
<fieldset>
    <legend>Сторона $i</legend>
    <label for="wall_opening_side_{$i}_length">Длина стороны:</label>
    <input id="wall_opening_side_{$i}_length" type="number" name="wall_opening_side_{$i}_length" value="500" min="0" required><br/><br/>
    <label for="wall_opening_side_{$i}_width">Ширина по горизонтали:</label>
    <input type="number" id="wall_opening_side_{$i}_width" name="wall_opening_side_{$i}_width" value="500" min="0" required>
    <label for="wall_opening_side_{$i}_height">высота по вертикали:</label>
    <input type="number" id="wall_opening_side_{$i}_height" name="wall_opening_side_{$i}_height" value="500" min="0" required><br/><br/>
    <label for="wall_opening_side_{$i}_assembly_seam">Шов:</label>
    <input id="wall_opening_side_{$i}_assembly_seam" type="number" name="wall_opening_side_{$i}_assembly_seam" value="500" min="0" required>
    <label for="negate_wall_opening_side_{$i}_assembly_seam">Или это заход за четверть?</label>
    <input id="negate_wall_opening_side_{$i}_assembly_seam" type="checkbox" name="negate_wall_opening_side_{$i}_assembly_seam" value="checked">
</fieldset>
SIDEFORM;
}
