<?php
require "../model/location.php";
if (isset($_GET['province_id']) && is_numeric($_GET['province_id'])) {
    $provinceId = (int)$_GET['province_id'];

    $data = getDistricts($provinceId);

    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);

} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid province_id']);
}