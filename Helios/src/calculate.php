<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
    if (isset($_POST['JSON_Data']))
    {
        $decodedArray=json_decode($_POST['JSON_Data'],true);
        foreach($decodedArray as $key => $value) {
            echo $key.'>>>'.$value;
        }
    } else {
        echo 'no data';
    }
}
