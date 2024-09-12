<?php
include_once '../lib/connect.php';

if (isset($_GET['province_id']) && is_numeric($_GET['province_id'])) {
    $province_id = (int)$_GET['province_id'];
    // Sử dụng prepared statement để tránh SQL injection
    $sql = "SELECT * FROM `districts` WHERE `province_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $province_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['district_id'],
            'name' => utf8_encode($row['district_name'])
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);

    $stmt->close();
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid province_id']);
}

