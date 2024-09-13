<?php
require '../lib/connect.php';

$sql = "SELECT * FROM provinces";
$result = mysqli_query($GLOBALS["conn"], $sql);
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        "id" => $row["province_id"],
        "name" => utf8_encode($row["province_name"]),
    );
}
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);