<?php
$sql = "select DISTINCT ncc.tenNCC, pn.idPN, tongtien, ngaytao, ngaycapnhat, pn.trangthai 
        from phieunhap as pn
        inner join ctphieunhap as ctpn on pn.idPN = ctpn.idPN
        inner join sach as s on ctpn.idSach = s.idSach
        inner join nhacungcap as ncc on s.idNCC = ncc.idNCC
        where 1";

if(isset($_POST['btnsearch'])) {
    $kyw = $_POST['kyw'];
    if(!empty($kyw)) $sql .= " and (pn.idPN LIKE '%".$kyw."%' or ncc.tenNCC LIKE '%".$kyw."%')";
        
    if($_POST['from'] != "" && $_POST['to'] != ""){
        $from = date('Y-m-d', strtotime($_POST['from']));
        $to = date('Y-m-d', strtotime($_POST['to']));
        if($from > $to) {
            echo "
                <script>alert('Ngày bắt đầu không thể lớn hơn ngày kết thúc!')</script>
            ";
        } else{
            $sql.=' AND ngaycapnhat BETWEEN "'.$from.'" AND "'.$to.'"';
        }
    }
    else if(($_POST['from'] == "" && $_POST['to']!= "") || ($_POST['from'] != "" && $_POST['to'] == "")){
        if($_POST['from'] == "") $sql.=' AND ngaycapnhat <= "'.$_POST['to'].'"';
        if($_POST['to'] == "") $sql.=' AND ngaycapnhat >= "'.$_POST['from'].'"';
    }
} 
$sql.= " order by pn.idPN";

$result = getAll($sql);
$_SESSION['searchResult'] = $result;
?>