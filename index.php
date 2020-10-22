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
        <input id="wall_opening_width" type="number" name="wall_opening_width"><br/>
        <label for="wall_opening_height">Высота:</label>
        <input id="wall_opening_height" type="number" name="wall_opening_height"><br/>
        <label for="assembly_seam">Монтажный шов (минус, если заход за четверть)</label>
        <input id="assembly_seam" type="number" name="assembly_seam" value="20"><br/>
        <label for="bottom_assembly_seam">Монтажный шов снизу, включая подставочный (минус, если заход окна за четверть)</label>
        <input id="bottom_assembly_seam" type="number" name="bottom_assembly_seam" value="50"><br/>
        <input type="submit" value="Рассчитать">
    </fieldset>
</form>
</body>
</html>