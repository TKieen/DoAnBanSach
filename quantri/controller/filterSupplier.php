<?php
$sql = "select idNCC, tenNCC, email, dienthoai, trangthai 
        from nhacungcap 
        where 1";
if(isset($_POST['btnsearch'])) {
    $kyw = $_POST['kyw'];
    if(!empty($kyw)) {
        $sql .= " and (idNCC LIKE '%".$kyw."%' or tenNCC LIKE '%".$kyw."%' or dienthoai LIKE '%".$kyw."%')";

        if(isset($_POST['user-status']) && ($_POST['user-status']) != -1) {
            $trangthai = $_POST['user-status'];
            $sql .= " and trangthai = '$trangthai'";
        }
    } else {
        if(isset($_POST['user-status']) && ($_POST['user-status']) != -1) {
            $trangthai = $_POST['user-status'];
            $sql .= " and trangthai = '$trangthai'";
        }
    }
}

if(isset($_POST['sort'])){
    if($_POST['sort'] == 'AZ') {
        $sql .= " order by tenNCC asc";
    } else if ($_POST['sort'] == 'ZA') {
        $sql .= " order by tenNCC desc";
    }
}

$result = getAll($sql);
$_SESSION['searchResult'] = $result;
?>