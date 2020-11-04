<form action="index.php" method="post">
    <fieldset>
        <legend>Размеры проема</legend>
        <fieldset>
            <legend>Левый нижний край (наклонная)</legend>
            <?php $currentState = isset($_POST['wall_opening_bottom_to_left']) ? $_POST['wall_opening_bottom_to_left'] : 500;?>
            <label for="wall_opening_bottom_to_left">Длина стороны:</label>
            <input id="wall_opening_bottom_to_left" type="number" name="wall_opening_bottom_to_left" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['wall_opening_bottom_to_left_width']) ? $_POST['wall_opening_bottom_to_left_width'] : 354;?>
            <label for="wall_opening_bottom_to_left_width">Ширина по горизонтали:</label>
            <input type="number" id="wall_opening_bottom_to_left_width" name="wall_opening_bottom_to_left_width" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['wall_opening_bottom_to_left_height']) ? $_POST['wall_opening_bottom_to_left_height'] : 354;?>
            <label for="wall_opening_bottom_to_left_height">высота по вертикали:</label>
            <input type="number" id="wall_opening_bottom_to_left_height" name="wall_opening_bottom_to_left_height" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['bottom_to_left_assembly_seam']) ? $_POST['bottom_to_left_assembly_seam'] : 20;?>
            <label for="bottom_to_left_assembly_seam">Шов:</label>
            <input id="bottom_to_left_assembly_seam" type="number" name="bottom_to_left_assembly_seam" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['negate_bottom_to_left_assembly_seam']) ? $_POST['negate_bottom_to_left_assembly_seam'] : "";?>
            <label for="negate_bottom_to_left_assembly_seam">Или это заход за четверть?</label>
            <input id="negate_bottom_to_left_assembly_seam" type="checkbox" name="negate_bottom_to_left_assembly_seam" value="checked" <?= $currentState;?>>
        </fieldset>
        <fieldset>
            <legend>Левый край (вертикальная)</legend>
            <?php $currentState = isset($_POST['wall_opening_left']) ? $_POST['wall_opening_left'] : 500;?>
            <label for="wall_opening_left">Длина стороны:</label>
            <input id="wall_opening_left" type="number" name="wall_opening_left" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['left_assembly_seam']) ? $_POST['left_assembly_seam'] : 20;?>
            <label for="left_assembly_seam">Шов:</label>
            <input id="left_assembly_seam" type="number" name="left_assembly_seam" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['negate_left_assembly_seam']) ? $_POST['negate_left_assembly_seam'] : "";?>
            <label for="negate_left_assembly_seam">Или это заход за четверть?</label>
            <input id="negate_left_assembly_seam" type="checkbox" name="negate_left_assembly_seam" value="checked" <?= $currentState;?>>
        </fieldset>
        <fieldset>
            <legend>Левый верхний край (наклонная)</legend>
            <?php $currentState = isset($_POST['wall_opening_left_to_top']) ? $_POST['wall_opening_left_to_top'] : 500;?>
            <label for="wall_opening_left_to_top">Длина стороны:</label>
            <input id="wall_opening_left_to_top" type="number" name="wall_opening_left_to_top" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['wall_opening_left_to_top_width']) ? $_POST['wall_opening_left_to_top_width'] : 354;?>
            <label for="wall_opening_left_to_top_width">Ширина по горизонтали:</label>
            <input type="number" id="wall_opening_left_to_top_width" name="wall_opening_left_to_top_width" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['wall_opening_left_to_top_height']) ? $_POST['wall_opening_left_to_top_height'] : 354;?>
            <label for="wall_opening_left_to_top_height">высота по вертикали:</label>
            <input type="number" id="wall_opening_left_to_top_height" name="wall_opening_left_to_top_height" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['left_to_top_assembly_seam']) ? $_POST['left_to_top_assembly_seam'] : 20;?>
            <label for="left_to_top_assembly_seam">Шов:</label>
            <input id="left_to_top_assembly_seam" type="number" name="left_to_top_assembly_seam" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['negate_left_to_top_assembly_seam']) ? $_POST['negate_left_to_top_assembly_seam'] : "";?>
            <label for="negate_left_to_top_assembly_seam">Или это заход за четверть?</label>
            <input id="negate_left_to_top_assembly_seam" type="checkbox" name="negate_left_to_top_assembly_seam" value="checked" <?= $currentState;?>>
        </fieldset>
        <fieldset>
            <legend>Верхний край (горизонтальная)</legend>
            <?php $currentState = isset($_POST['wall_opening_top']) ? $_POST['wall_opening_top'] : 500;?>
            <label for="wall_opening_top">Длина стороны:</label>
            <input id="wall_opening_top" type="number" name="wall_opening_top" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['top_assembly_seam']) ? $_POST['top_assembly_seam'] : 20;?>
            <label for="top_assembly_seam">Шов:</label>
            <input id="top_assembly_seam" type="number" name="top_assembly_seam" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['negate_top_assembly_seam']) ? $_POST['negate_top_assembly_seam'] : "";?>
            <label for="negate_top_assembly_seam">Или это заход за четверть?</label>
            <input id="negate_top_assembly_seam" type="checkbox" name="negate_top_assembly_seam" value="checked" <?= $currentState;?>>
        </fieldset>
        <fieldset>
            <legend>Правый верхний край (наклонная)</legend>
            <?php $currentState = isset($_POST['wall_opening_top_to_right']) ? $_POST['wall_opening_top_to_right'] : 500;?>
            <label for="wall_opening_top_to_right">Длина стороны:</label>
            <input id="wall_opening_top_to_right" type="number" name="wall_opening_top_to_right" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['wall_opening_top_to_right_width']) ? $_POST['wall_opening_top_to_right_width'] : 354;?>
            <label for="wall_opening_top_to_right_width">Ширина по горизонтали:</label>
            <input type="number" id="wall_opening_top_to_right_width" name="wall_opening_top_to_right_width" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['wall_opening_top_to_right_height']) ? $_POST['wall_opening_top_to_right_height'] : 354;?>
            <label for="wall_opening_top_to_right_height">высота по вертикали:</label>
            <input type="number" id="wall_opening_top_to_right_height" name="wall_opening_top_to_right_height" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['top_to_right_assembly_seam']) ? $_POST['top_to_right_assembly_seam'] : 20;?>
            <label for="top_to_right_assembly_seam">Шов:</label>
            <input id="top_to_right_assembly_seam" type="number" name="top_to_right_assembly_seam" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['negate_top_to_right_assembly_seam']) ? $_POST['negate_top_to_right_assembly_seam'] : "";?>
            <label for="negate_top_to_right_assembly_seam">Или это заход за четверть?</label>
            <input id="negate_top_to_right_assembly_seam" type="checkbox" name="negate_top_to_right_assembly_seam" value="checked" <?= $currentState;?>>
        </fieldset>
        <fieldset>
            <legend>Правый край (вертикальная)</legend>
            <?php $currentState = isset($_POST['wall_opening_right']) ? $_POST['wall_opening_right'] : 500;?>
            <label for="wall_opening_right">Длина стороны:</label>
            <input id="wall_opening_right" type="number" name="wall_opening_right" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['right_assembly_seam']) ? $_POST['right_assembly_seam'] : 20;?>
            <label for="right_assembly_seam">Шов:</label>
            <input id="right_assembly_seam" type="number" name="right_assembly_seam" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['negate_right_assembly_seam']) ? $_POST['negate_right_assembly_seam'] : "";?>
            <label for="negate_right_assembly_seam">Или это заход за четверть?</label>
            <input id="negate_right_assembly_seam" type="checkbox" name="negate_right_assembly_seam" value="checked" <?= $currentState;?>>
        </fieldset>
        <fieldset>
            <legend>Правый нижний край (наклонная)</legend>
            <?php $currentState = isset($_POST['wall_opening_right_to_bottom']) ? $_POST['wall_opening_right_to_bottom'] : 500;?>
            <label for="wall_opening_right_to_bottom">Длина стороны:</label>
            <input id="wall_opening_right_to_bottom" type="number" name="wall_opening_right_to_bottom" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['wall_opening_right_to_bottom_width']) ? $_POST['wall_opening_right_to_bottom_width'] : 354;?>
            <label for="wall_opening_right_to_bottom_width">Ширина по горизонтали:</label>
            <input type="number" id="wall_opening_right_to_bottom_width" name="wall_opening_right_to_bottom_width" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['wall_opening_right_to_bottom_height']) ? $_POST['wall_opening_right_to_bottom_height'] : 354;?>
            <label for="wall_opening_right_to_bottom_height">высота по вертикали:</label>
            <input type="number" id="wall_opening_right_to_bottom_height" name="wall_opening_right_to_bottom_height" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['right_to_bottom_assembly_seam']) ? $_POST['right_to_bottom_assembly_seam'] : 20;?>
            <label for="right_to_bottom_assembly_seam">Шов:</label>
            <input id="right_to_bottom_assembly_seam" type="number" name="right_to_bottom_assembly_seam" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['negate_right_to_bottom_assembly_seam']) ? $_POST['negate_right_to_bottom_assembly_seam'] : "";?>
            <label for="negate_right_to_bottom_assembly_seam">Или это заход за четверть?</label>
            <input id="negate_right_to_bottom_assembly_seam" type="checkbox" name="negate_right_to_bottom_assembly_seam" value="checked" <?= $currentState;?>>
        </fieldset>
        <fieldset>
            <legend>Нижний край (горизонтальная)</legend>
            <?php $currentState = isset($_POST['wall_opening_bottom']) ? $_POST['wall_opening_bottom'] : 500;?>
            <label for="wall_opening_bottom">Длина стороны:</label>
            <input id="wall_opening_bottom" type="number" name="wall_opening_bottom" value="<?= $currentState;?>" min="0" required><br/><br/>
            <?php $currentState = isset($_POST['bottom_assembly_seam']) ? $_POST['bottom_assembly_seam'] : 20;?>
            <label for="bottom_assembly_seam">Шов, включая подставочный:</label>
            <input id="bottom_assembly_seam" type="number" name="bottom_assembly_seam" value="<?= $currentState;?>" min="0" required>
            <?php $currentState = isset($_POST['negate_bottom_assembly_seam']) ? $_POST['negate_bottom_assembly_seam'] : "";?>
            <label for="negate_bottom_assembly_seam">Или это заход за четверть?</label>
            <input id="negate_bottom_assembly_seam" type="checkbox" name="negate_bottom_assembly_seam" value="checked" <?= $currentState;?>>
        </fieldset>
        <fieldset>
            <legend>Отправить значения</legend>
            <input type="submit" value="ОК">
        </fieldset>
    </fieldset>
</form>

