<?php
include_once '../lib/connect.php';
function getProvinces() {
    $sql = "SELECT * FROM provinces";
    $result = mysqli_query($GLOBALS["conn"], $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            "id" => $row["province_id"],
            "name" => $row["province_name"]
        );
    }
    return $data;
}

function getDistricts($provinceId) {
    $sql = "SELECT * FROM `districts` WHERE `province_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $provinceId);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['district_id'],
            'name' => $row['district_name']
        ];
    }
    return $data;
}

function getWards($districtId) {
    $sql = "SELECT * FROM `wards` WHERE `district_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $districtId);

    $stmt->execute();

    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['ward_id'],
            'name' => $row['ward_name']
        ];
    }
    return $data;
}

function getProvinceNameById($provinceId) {
    $sql = "SELECT * FROM `provinces` WHERE `province_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $provinceId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row["province_name"];
}
function getDistrictNameById($districtId) {
    $sql = "SELECT * FROM `districts` WHERE `district_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $districtId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row["district_name"];
}
function getWardNameById($wardId) {
    $sql = "SELECT * FROM `wards` WHERE `ward_id` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $wardId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row["ward_name"];
}