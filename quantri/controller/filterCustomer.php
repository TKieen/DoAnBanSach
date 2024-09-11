<?php
$sql = "select * from taikhoan where phanquyen = 'KH'";
if(isset($_POST['btnsearch'])) {
    $kyw = $_POST['kyw'];
    if(!empty($kyw)) {
        $sql .= " and (idTK LIKE '%".$kyw."%' or tenTK LIKE '%".$kyw."%' or dienthoai LIKE '%".$kyw."%')";

        if(isset($_POST['user-status']) && ($_POST['user-status']) != -1) {
            $trangthai = $_POST['user-status'];
            $sql .= " and trangthai = '$trangthai'";
        }
    }
    else {
        if(isset($_POST['user-status']) && ($_POST['user-status']) != -1) {
            $trangthai = $_POST['user-status'];
            $sql .= " and trangthai = '$trangthai'";
        }
    }
}

$result = getAll($sql);
$_SESSION['searchResult'] = $result;
?>