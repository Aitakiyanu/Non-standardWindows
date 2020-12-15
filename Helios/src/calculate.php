<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
    if (isset($_POST))
    {
        var_dump($_POST);
    } else {
        echo 'no data';
    }
}
