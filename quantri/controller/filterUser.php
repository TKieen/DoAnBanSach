<?php
$sql = "select * from taikhoan where 1";
if(isset($_POST['btnsearch'])) {
    $kyw = $_POST['kyw'];
    if(!empty($kyw)) {
        $sql .= " and (idTK LIKE '%".$kyw."%' or tenTK LIKE '%".$kyw."%' or dienthoai LIKE '%".$kyw."%')";

        if(isset($_POST['phanquyen']) && ($_POST['phanquyen']) != -1) {
            $phanquyen = $_POST['phanquyen'];
            $sql .= " and phanquyen = '$phanquyen'";
        }

        if(isset($_POST['user-status']) && ($_POST['user-status']) != -1) {
            $trangthai = $_POST['user-status'];
            $sql .= " and trangthai = '$trangthai'";
        }
    }
    else {
        if(isset($_POST['phanquyen']) && ($_POST['phanquyen']) != -1) {
            $phanquyen = $_POST['phanquyen'];
            $sql .= " and phanquyen = '$phanquyen'";
        }

        if(isset($_POST['user-status']) && ($_POST['user-status']) != -1) {
            $trangthai = $_POST['user-status'];
            $sql .= " and trangthai = '$trangthai'";
        }
    }
}

$result = getAll($sql);
$_SESSION['searchResult'] = $result;
?>