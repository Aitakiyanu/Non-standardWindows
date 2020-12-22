<?php
namespace Helios;

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
    $data = json_decode(file_get_contents('php://input'), true);
    include_once 'wall-opening-sides-array.php';
    include_once 'intersections-calculation.php';
    echo json_encode($data);
}
