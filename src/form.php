<form action="index.php" method="post">
    <fieldset>
        <legend>Размеры проема</legend>
        <!--Низ слева-->
        <?php $size = isset($_POST["wall_opening_bottom_to_left"]) ? $_POST["wall_opening_bottom_to_left"] : 500;?>
        <label for="wall_opening_bottom_to_left">Наклонная внизу слева:</label>
        <input id="wall_opening_bottom_to_left" type="number" name="wall_opening_bottom_to_left" value="<?php echo $size;?>">
        <label for="bottom_to_left_assembly_seam">шов:</label>
        <input id="bottom_to_left_assembly_seam" type="number" name="bottom_to_left_assembly_seam" value="20">
        <label for="negate_bottom_to_left_assembly_seam">или галочка, если это заход за четверть:</label>
        <input id="negate_bottom_to_left_assembly_seam" type="checkbox" name="negate_bottom_to_left_assembly_seam"><br/>
        <label for="wall_opening_bottom_to_left_width">Ширина наклонной внизу слева:</label>
        <input type="number" id="wall_opening_bottom_to_left_width" name="wall_opening_bottom_to_left_width" value="354">
        <label for="wall_opening_bottom_to_left_height">высота наклонной внизу слева:</label>
        <input type="number" id="wall_opening_bottom_to_left_height" name="wall_opening_bottom_to_left_height" value="354"><br/><br/>
        <!--Левый край-->
        <?php $size = isset($_POST["wall_opening_left"]) ? $_POST["wall_opening_left"] : 500;?>
        <label for="wall_opening_left">Лево:</label>
        <input id="wall_opening_left" type="number" name="wall_opening_left" value="<?php echo $size;?>">
        <label for="left_assembly_seam">шов:</label>
        <input id="left_assembly_seam" type="number" name="left_assembly_seam" value="20">
        <label for="negate_left_assembly_seam">или галочка, если это заход за четверть:</label>
        <input id="negate_left_assembly_seam" type="checkbox" name="negate_left_assembly_seam"><br/><br/>
        <!--Верх слева-->
        <?php $size = isset($_POST["wall_opening_left_to_top"]) ? $_POST["wall_opening_left_to_top"] : 500;?>
        <label for="wall_opening_left_to_top">Наклонная вверху слева:</label>
        <input id="wall_opening_left_to_top" type="number" name="wall_opening_left_to_top" value="<?php echo $size;?>">
        <label for="left_to_top_assembly_seam">шов:</label>
        <input id="left_to_top_assembly_seam" type="number" name="left_to_top_assembly_seam" value="20">
        <label for="negate_left_to_top_assembly_seam">или галочка, если это заход за четверть:</label>
        <input id="negate_left_to_top_assembly_seam" type="checkbox" name="negate_left_to_top_assembly_seam"><br/>
        <label for="wall_opening_left_to_top_width">Ширина наклонной вверху слева:</label>
        <input type="number" id="wall_opening_left_to_top_width" name="wall_opening_left_to_top_width" value="354">
        <label for="wall_opening_left_to_top_height">высота наклонной вверху слева:</label>
        <input type="number" id="wall_opening_left_to_top_height" name="wall_opening_left_to_top_height" value="354"><br/><br/>
        <!--Верхний край-->
        <?php $size = isset($_POST["wall_opening_top"]) ? $_POST["wall_opening_top"] : 500;?>
        <label for="wall_opening_top">Верх:</label>
        <input id="wall_opening_top" type="number" name="wall_opening_top" value="<?php echo $size;?>">
        <label for="top_assembly_seam">шов:</label>
        <input id="top_assembly_seam" type="number" name="top_assembly_seam" value="20">
        <label for="negate_top_assembly_seam">или галочка, если это заход за четверть:</label>
        <input id="negate_top_assembly_seam" type="checkbox" name="negate_top_assembly_seam"><br/><br/>
        <!--Верх справа-->
        <?php $size = isset($_POST["wall_opening_top_to_right"]) ? $_POST["wall_opening_top_to_right"] : 500;?>
        <label for="wall_opening_top_to_right">Наклонная вверху справа:</label>
        <input id="wall_opening_top_to_right" type="number" name="wall_opening_top_to_right" value="<?php echo $size;?>">
        <label for="top_to_right_assembly_seam">шов:</label>
        <input id="top_to_right_assembly_seam" type="number" name="top_to_right_assembly_seam" value="20">
        <label for="negate_top_to_right_assembly_seam">или галочка, если это заход за четверть:</label>
        <input id="negate_top_to_right_assembly_seam" type="checkbox" name="negate_top_to_right_assembly_seam"><br/>
        <label for="wall_opening_top_to_right_width">Ширина наклонной вверху справа:</label>
        <input type="number" id="wall_opening_top_to_right_width" name="wall_opening_top_to_right_width" value="354">
        <label for="wall_opening_top_to_right_height">высота наклонной вверху справа:</label>
        <input type="number" id="wall_opening_top_to_right_height" name="wall_opening_top_to_right_height" value="354"><br/><br/>
        <!--Правый край-->
        <?php $size = isset($_POST["wall_opening_right"]) ? $_POST["wall_opening_right"] : 500;?>
        <label for="wall_opening_right">Право:</label>
        <input id="wall_opening_right" type="number" name="wall_opening_right" value="<?php echo $size;?>">
        <label for="right_assembly_seam">шов:</label>
        <input id="right_assembly_seam" type="number" name="right_assembly_seam" value="20">
        <label for="negate_right_assembly_seam">или галочка, если это заход за четверть:</label>
        <input id="negate_right_assembly_seam" type="checkbox" name="negate_right_assembly_seam"><br/><br/>
        <!--Низ справа-->
        <?php $size = isset($_POST["wall_opening_right_to_bottom"]) ? $_POST["wall_opening_right_to_bottom"] : 500;?>
        <label for="wall_opening_right_to_bottom">Наклонная внизу справа:</label>
        <input id="wall_opening_right_to_bottom" type="number" name="wall_opening_right_to_bottom" value="<?php echo $size;?>">
        <label for="right_to_bottom_assembly_seam">шов:</label>
        <input id="right_to_bottom_assembly_seam" type="number" name="right_to_bottom_assembly_seam" value="20">
        <label for="negate_right_to_bottom_assembly_seam">или галочка, если это заход за четверть:</label>
        <input id="negate_right_to_bottom_assembly_seam" type="checkbox" name="negate_right_to_bottom_assembly_seam"><br/>
        <label for="wall_opening_right_to_bottom_width">Ширина наклонной внизу справа:</label>
        <input type="number" id="wall_opening_right_to_bottom_width" name="wall_opening_right_to_bottom_width" value="354">
        <label for="wall_opening_right_to_bottom_height">высота наклонной внизу справа:</label>
        <input type="number" id="wall_opening_right_to_bottom_height" name="wall_opening_right_to_bottom_height" value="354"><br/><br/>
        <!--Нижний край-->
        <?php $size = isset($_POST["wall_opening_bottom"]) ? $_POST["wall_opening_bottom"] : 500;?>
        <label for="wall_opening_bottom">Низ:</label>
        <input id="wall_opening_bottom" type="number" name="wall_opening_bottom" value="<?php echo $size;?>">
        <label for="bottom_assembly_seam">шов, включая подставочный:</label>
        <input id="bottom_assembly_seam" type="number" name="bottom_assembly_seam" value="20">
        <label for="negate_bottom_assembly_seam">или галочка, если это заход за четверть:</label>
        <input id="negate_bottom_assembly_seam" type="checkbox" name="negate_bottom_assembly_seam"><br/><br/>
        <input type="submit" value="Рассчитать">
    </fieldset>
</form>

