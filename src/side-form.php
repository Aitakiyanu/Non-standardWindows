<?php //Начнем с первой стороны, которая идет вверх и не влево
$wallOpeningSides = [];
for ($i = 0, $size = count($wallOpeningSides) >= 3 ? count($wallOpeningSides) : 3; $i < $size; $i++) {
    include_once 'src/WallOpeningSide.php';
    if ($_POST) {
        $seamSign = isset($_POST["negate_assembly_seam_{$i}"]) ? -1 : 1;
        $prvSide = ($i == 0 ? $size : $i) - 1;
        $prvSideX = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endX : 0;
        $prvSideY = isset($wallOpeningSides[$prvSide]) ? $wallOpeningSides[$prvSide]->endY : 0;
        $wallOpeningSides[$i] = new WallOpeningSide($_POST["wall_opening_side_length_{$i}"],
            $_POST["wall_opening_side_width_{$i}"],
            $_POST["wall_opening_side_height_{$i}"],
            $seamSign * $_POST["side_assembly_seam_{$i}"],
            $prvSideX,
            $prvSideY);
    }

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
