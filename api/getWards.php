<?php
require '../lib/connect.php';
include_once '../model/location.php';
if (isset($_GET['district_id']) && is_numeric($_GET['district_id'])) {
    $district_id = (int)$_GET['district_id'];

    $data = getWards($district_id);

    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid province_id']);
}