<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
    $data = json_decode(file_get_contents('php://input'), true);
    echo json_encode($data);
}
