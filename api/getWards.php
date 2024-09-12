<?php
include_once '..\lib\connect.php';

if (isset($_GET['district_id']) && is_numeric($_GET['district_id'])) {
    $district_id = (int)$_GET['district_id'];

    $sql = "SELECT * FROM `wards` WHERE `district_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $district_id);

    $stmt->execute();

    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['ward_id'],
            'name' => utf8_encode($row['ward_name'])
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);

    $stmt->close();
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid province_id']);
}