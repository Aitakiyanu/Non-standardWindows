<?php
namespace Helios;

$data = json_decode(file_get_contents('php://input'), true);
include_once 'wall-opening-sides-array.php';
include_once 'intersections-calculation.php';
echo json_encode($wallOpeningSides);
