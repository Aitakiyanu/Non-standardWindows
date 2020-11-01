<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ввод размеров проема</title>
</head>
<body>
<form action="rectwincalc.php" method="get">
    <fieldset>
        <legend>Размеры проема</legend>
        <label for="wall_opening_width">Ширина:</label>
        <input id="wall_opening_width" type="number" name="wall_opening_width" value="1300"><br/>
        <label for="wall_opening_height">Высота:</label>
        <input id="wall_opening_height" type="number" name="wall_opening_height" value="1400"><br/>
        <label for="assembly_seam">Монтажный шов</label>
        <input id="assembly_seam" type="number" name="assembly_seam" value="20">
        <label for="negate_assembly_seam">Заход за четверть</label>
        <input id="negate_assembly_seam" type="checkbox" name="negate_assembly_seam"><br/>
        <label for="bottom_assembly_seam">Монтажный шов снизу, включая подставочный</label>
        <input id="bottom_assembly_seam" type="number" name="bottom_assembly_seam" value="50">
        <label for="negate_bottom_assembly_seam">Заход за четверть</label>
        <input id="negate_bottom_assembly_seam" type="checkbox" name="negate_bottom_assembly_seam"><br/>
        <input type="submit" value="Рассчитать">
    </fieldset>
</form>
</body>
</html>