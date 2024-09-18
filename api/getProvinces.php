<?php
require '../lib/connect.php';
require '../model/location.php';
$data = getProvinces();
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);