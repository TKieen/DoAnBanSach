<?php
$sql = "select * from theloai where 1";
if(isset($_POST['btnsearch'])) {
    $kyw = $_POST['kyw'];
    if(!empty($kyw)) {
        $sql .= " and (idTL LIKE '%".$kyw."%' or tenTL LIKE '%".$kyw."%')";
    }
}
$result = getAll($sql);
$_SESSION['searchResult'] = $result;
?>