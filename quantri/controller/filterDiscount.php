<?php
$sql = "select * from magiamgia where 1";
if(isset($_POST['btnsearch'])) {
    $kyw = $_POST['kyw'];
    if(!empty($kyw)) {
        $sql .= " and (idMGG LIKE '%".$kyw."%' or phantram LIKE '%".$kyw."%')";
    }
}
$result = getAll($sql);
$_SESSION['searchResult'] = $result;
?>