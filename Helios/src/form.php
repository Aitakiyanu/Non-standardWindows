<?php
namespace Helios;

if (count($_POST) > 0) {
    include_once 'wall-opening-sides-array.php';
    include_once 'intersections-calculation.php';
    if (!empty($intersections)) {
        include_once 'window-sides-length-calculation.php';
        include_once 'visualisation.php';
    }
}
?>
<form action="" method="post">
    <fieldset id="entire_form">
        <legend>Размеры проема</legend>
        <?php include_once 'side-form.php';?>
        <fieldset>
            <legend>Отправить значения</legend>
            <input id="sendvalues" type="submit" value="ОК">
        </fieldset>
    </fieldset>
</form>
